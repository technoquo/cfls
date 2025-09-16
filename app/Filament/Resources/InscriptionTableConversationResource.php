<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InscriptionTableConversationResource\Pages;
use App\Filament\Resources\InscriptionTableConversationResource\RelationManagers;
use App\Models\InscriptionTableConversation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Carbon;

class InscriptionTableConversationResource extends Resource
{
    protected static ?string $model = InscriptionTableConversation::class;

    protected static ?string $navigationLabel = 'Inscriptions aux tables de conversation';
    protected static ?string $label = 'Inscription à une table de conversation';
    protected static ?string $navigationGroup = 'Commandes & Inscriptions';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('first_name')
                    ->label('Prénom')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('last_name')
                    ->label('Nom')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->label('Téléphone')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('tableconversation_id')
                    ->label('Date de la table de conversation')
                    ->required()
                    ->options(function () {
                        return \App\Models\TableConversation::with('formation')
                            ->where('open', 1)
                            ->where('status', 1)
                            ->orderBy('date_start')
                            ->get()
                            ->mapWithKeys(function ($item) {
                                $label = \Illuminate\Support\Carbon::parse($item->date_start)->format('d/m/Y')
                                    . ' de ' . $item->hour_start
                                    . ' à ' . $item->hour_end
                                    . ' - ' . ($item->formation->title ?? 'Formation inconnue');

                                return [$item->id => $label];
                            })
                            ->toArray();
                    })

                    ->hint('Choisissez une date et une heure de table disponible')
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('status')
                    ->label('Statut')
                    ->afterStateUpdated(function ($record, $state) {
                        // Solo si el estado cambió a confirmado (1)
                        if ($state && !$record->getOriginal('status')) {
                            \Mail::to($record->email)->send(new \App\Mail\ConfirmationReservationMail($record));
                        }
                    }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('first_name')
                    ->label('Prénom')
                    ->searchable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->label('Nom')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label('Téléphone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tableconversation.date_start')
                    ->label('Date de la table')
                    ->formatStateUsing(function ($state, $record) {
                        if (!$record->tableconversation) return '-';

                        return \Illuminate\Support\Carbon::parse($record->tableconversation->date_start)->format('d/m/Y')
                            . ' de ' . $record->tableconversation->hour_start
                            . ' à ' . $record->tableconversation->hour_end;
                    }),
                Tables\Columns\IconColumn::make('status')
                    ->label('Statut')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Créé le')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Mis à jour le')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListInscriptionTableConversations::route('/'),
            'create' => Pages\CreateInscriptionTableConversation::route('/creer'),
            'edit' => Pages\EditInscriptionTableConversation::route('/{record}/modifier'),
        ];
    }
}
