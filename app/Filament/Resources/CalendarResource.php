<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CalendarResource\Pages;
use App\Filament\Resources\CalendarResource\RelationManagers;
use App\Models\Calendar;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CalendarResource extends Resource
{
    protected static ?string $model = Calendar::class;
    protected static ?string $navigationLabel = 'Calendier';
    protected static ?string $label = 'Calendier';
    protected static ?string $navigationGroup = 'Formations';
    protected static ?int $navigationSort = 2;



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('formations_id')
                    ->label('Formation')
                    ->options(\App\Models\Formations::query()
                        ->whereIn('id', [3, 4])
                        ->pluck('title', 'id')
                        ->toArray()
                    )
                    ->required()
                    ->reactive(), // This is important to trigger reactivity

                Forms\Components\Select::make('levels_id')
                    ->label('Niveau')
                    ->relationship('levels', 'name')
                    ->required(),

                Forms\Components\DatePicker::make('start_date')
                    ->label('Date de début')
                    ->required()
                    ->displayFormat('d/m/Y') // what the user sees
                    ->format('Y-m-d')        // what is stored in the DB (correct for MySQL)
                    ->native(false),         // use flatpickr (not native browser picker)

                Forms\Components\DatePicker::make('end_date')
                    ->label('Date de fin')
                    ->required()
                    ->displayFormat('d/m/Y') // what the user sees
                    ->format('Y-m-d')        // what is stored in the DB (correct for MySQL)
                    ->native(false),         // use flatpickr (not native browser picker)

                Forms\Components\TextInput::make('price')
                    ->label('Prix')
                    ->required()
                    ->numeric()
                    ->prefix('€'),

                Forms\Components\TextInput::make('hour_start')
                    ->label('Heure de début')
                    ->inputMode('numeric')
                    ->mask('99:99')
                    ->placeholder('HH:MM')
                    ->rules(['regex:/^([01]?[0-9]|2[0-3]):[0-5][0-9]$/']),
                  //  ->visible(fn (callable $get) => $get('formation_id') != 3),

                Forms\Components\TextInput::make('hour_end')
                    ->label('Heure de fin')
                    ->inputMode('numeric')
                    ->mask('99:99')
                    ->placeholder('HH:MM')
                    ->rules(['regex:/^([01]?[0-9]|2[0-3]):[0-5][0-9]$/']),
                 //   ->visible(fn (callable $get) => $get('formation_id') != 3),

                Forms\Components\TextInput::make('day')
                    ->label('Jour')
                    ->maxLength(255),
                   // ->visible(fn (callable $get) => $get('formation_id') != 3),

                Forms\Components\Toggle::make('quota')
                    ->label('Quota')
                    ->helperText('Le quota est plein'),

                Forms\Components\FileUpload::make('image')
                    ->label('Image')
                    ->image()
                    ->required(),

                Forms\Components\Toggle::make('status')
                    ->label('Statut')
                   ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),
                Tables\Columns\TextColumn::make('formation.title')
                    ->label('Formation')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('levels.name')
                    ->label('Niveau')
                    ->searchable()
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('start_date')
                    ->label('Date de début')
                    ->searchable()
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_date')
                    ->label('Date de fin')
                    ->searchable()
                    ->date()
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('quota')
                    ->label('Quota')
                    ->onColor('success')
                    ->offColor('danger')
                    ->afterStateUpdated(function ($record, $state) {

                        // Mostrar notificación
                        \Filament\Notifications\Notification::make()
                            ->title('Quota mis à jour')
                            ->body("Le quota a été " . ($state ? 'activé' : 'désactivé'))
                            ->success()
                            ->send();
                        if (!$state) {
                            $record->update(['quota' => false]);
                        }



                    }),
                Tables\Columns\ToggleColumn::make('status')
                    ->label('Statut')
                    ->onColor('success')
                    ->offColor('danger')
                    ->afterStateUpdated(function ($record, $state) {

                        // Mostrar notificación
                        \Filament\Notifications\Notification::make()
                            ->title('Statut mis à jour')
                            ->body("Le statut a été " . ($state ? 'activé' : 'désactivé'))
                            ->success()
                            ->send();
                        if (!$state) {
                            $record->update(['status' => false]);
                        }



                    })

            ])
            ->defaultSort('id', 'desc')
            ->filters([
                Tables\Filters\Filter::make('date_range')
                    ->label('Période')
                    ->form([
                        Forms\Components\DatePicker::make('start')
                            ->label('Date de début')
                            ->displayFormat('d/m/Y')
                            ->format('Y-m-d')
                            ->native(false),

                        Forms\Components\DatePicker::make('end')
                            ->label('Date de fin')
                            ->displayFormat('d/m/Y')
                            ->format('Y-m-d')
                            ->native(false),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when($data['start'], fn ($q, $date) => $q->whereDate('start_date', '>=', $date))
                            ->when($data['end'], fn ($q, $date) => $q->whereDate('end_date', '<=', $date));
                    }),
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

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with(['formation', 'levels']);

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
            'index' => Pages\ListCalendars::route('/'),
            'create' => Pages\CreateCalendar::route('/create'),
            'edit' => Pages\EditCalendar::route('/{record}/edit'),
        ];
    }
}
