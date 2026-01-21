<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MembershipResource\Pages;
use App\Models\Membership;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Notifications\Notification;

class MembershipResource extends Resource
{
    protected static ?string $model = Membership::class;

    protected static ?string $navigationIcon = 'heroicon-o-identification';

    protected static ?string $navigationLabel = 'Adhésions';

    protected static ?string $modelLabel = 'Adhésion';

    protected static ?string $pluralModelLabel = 'Adhésions';

    protected static ?string $navigationGroup = 'Gestion des utilisateurs';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informations du membre')
                    ->schema([
                        Forms\Components\Select::make('user_id')
                            ->label('Utilisateur')
                            ->relationship('user', 'name')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->live()
                            ->afterStateUpdated(function ($state, Forms\Set $set) {
                                // Compléter automatiquement les dates pour une nouvelle adhésion
                                if ($state) {
                                    $set('start_date', now()->format('Y-m-d'));
                                    $set('end_date', now()->addYear()->format('Y-m-d'));
                                }
                            })
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('discount_percentage')
                            ->label('Pourcentage de réduction (%)')
                            ->numeric()
                            ->default(5.00)
                            ->minValue(0)
                            ->maxValue(100)
                            ->step(0.01)
                            ->suffix('%')
                            ->required(),

                        Forms\Components\Select::make('status')
                            ->label('Statut')
                            ->options([
                                'active' => 'Actif',
                                'expired' => 'Expiré',
                                'suspended' => 'Suspendu',
                            ])
                            ->default('active')
                            ->required(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Période de validité')
                    ->schema([
                        Forms\Components\DatePicker::make('start_date')
                            ->label('Date de début')
                            ->default(now())
                            ->required()
                            ->native(false)
                            ->displayFormat('d/m/Y')
                            ->live()
                            ->afterStateUpdated(function ($state, Forms\Set $set) {
                                // Calcul automatique de la date de fin (1 an après)
                                if ($state) {
                                    $set('end_date', \Carbon\Carbon::parse($state)->addYear()->format('Y-m-d'));
                                }
                            }),

                        Forms\Components\DatePicker::make('end_date')
                            ->label('Date de fin')
                            ->default(now()->addYear())
                            ->required()
                            ->native(false)
                            ->displayFormat('d/m/Y')
                            ->after('start_date'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Notes supplémentaires')
                    ->schema([
                        Forms\Components\Textarea::make('notes')
                            ->label('Notes')
                            ->rows(3)
                            ->maxLength(1000)
                            ->columnSpanFull(),
                    ])
                    ->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Utilisateur')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('user.email')
                    ->label('Email')
                    ->searchable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('discount_percentage')
                    ->label('Réduction')
                    ->suffix('%')
                    ->sortable()
                    ->alignCenter(),

                Tables\Columns\TextColumn::make('start_date')
                    ->label('Début')
                    ->date('d/m/Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('end_date')
                    ->label('Fin')
                    ->date('d/m/Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('days_remaining')
                    ->label('Jours restants')
                    ->getStateUsing(fn (Membership $record) => $record->daysRemaining())
                    ->badge()
                    ->color(fn ($state) => match (true) {
                        $state <= 0 => 'danger',
                        $state <= 30 => 'warning',
                        default => 'success',
                    })
                    ->alignCenter(),

                Tables\Columns\TextColumn::make('status')
                    ->label('Statut')
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'active' => 'Actif',
                        'expired' => 'Expiré',
                        'suspended' => 'Suspendu',
                    })
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'active' => 'success',
                        'expired' => 'danger',
                        'suspended' => 'warning',
                    })
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Créé le')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Statut')
                    ->options([
                        'active' => 'Actif',
                        'expired' => 'Expiré',
                        'suspended' => 'Suspendu',
                    ]),

                Tables\Filters\Filter::make('expiring_soon')
                    ->label('Expiration prochaine (30 jours)')
                    ->query(fn (Builder $query): Builder => $query->expiringSoon(30)),

                Tables\Filters\Filter::make('active')
                    ->label('Actifs uniquement')
                    ->query(fn (Builder $query): Builder => $query->active()),
            ])
            ->actions([
                Tables\Actions\Action::make('renew')
                    ->label('Renouveler')
                    ->icon('heroicon-o-arrow-path')
                    ->color('success')
                    ->requiresConfirmation()
                    ->action(function (Membership $record) {
                        $record->update([
                            'start_date' => now(),
                            'end_date' => now()->addYear(),
                            'status' => 'active',
                        ]);

                        Notification::make()
                            ->title('Adhésion renouvelée')
                            ->success()
                            ->send();
                    })
                    ->visible(fn (Membership $record) => $record->status === 'expired'),

                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),

                    Tables\Actions\BulkAction::make('suspend')
                        ->label('Suspendre')
                        ->icon('heroicon-o-pause')
                        ->color('warning')
                        ->requiresConfirmation()
                        ->action(function ($records) {
                            $records->each->update(['status' => 'suspended']);

                            Notification::make()
                                ->title('Adhésions suspendues')
                                ->success()
                                ->send();
                        }),

                    Tables\Actions\BulkAction::make('activate')
                        ->label('Activer')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->requiresConfirmation()
                        ->action(function ($records) {
                            $records->each->update(['status' => 'active']);

                            Notification::make()
                                ->title('Adhésions activées')
                                ->success()
                                ->send();
                        }),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMemberships::route('/'),
            'create' => Pages\CreateMembership::route('/create'),
            'edit' => Pages\EditMembership::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) static::getModel()::query()
            ->where('status', 'active')
            ->count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'success';
    }
}
