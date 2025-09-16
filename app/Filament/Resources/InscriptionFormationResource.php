<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InscriptionFormationResource\Pages;
use App\Filament\Resources\InscriptionFormationResource\RelationManagers;
use App\Models\InscriptionFormation;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class InscriptionFormationResource extends Resource
{
    protected static ?string $model = InscriptionFormation::class;

    protected static ?string $navigationLabel = 'Inscriptions aux formations';
    protected static ?string $label = 'Inscriptions aux formations';
    protected static ?string $navigationGroup = 'Commandes & Inscriptions';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('formations_id')
                    ->relationship('formation', 'title') // asume que 'name' es visible
                    ->required(),

                Select::make('levels_id')
                    ->relationship('level', 'name')
                    ->required(),

                Select::make('calendar_id')
                    ->relationship('calendar', 'start_date') // cambia 'label' si tu modelo usa otro campo
                    ->required(),

                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),

                Forms\Components\Toggle::make('reduit_rate')
                    ->label('Reduit'),


                Forms\Components\Toggle::make('status')
                    ->label('Statut')
                    ->afterStateUpdated(function ($record, $state) {

                        // Solo si el estado cambió a confirmado (1)
                        if ($state && !$record->getOriginal('status')) {
                            \Mail::to($record->user->email)->send(new \App\Mail\ConfirmationInscritpionMail($record));
                        }
                    }),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')->label('Utilisateur'),
                TextColumn::make('formation.title')->label('Formation'),
                TextColumn::make('level.name')->label('Niveau'),
                TextColumn::make('calendar.start_date')->date('d/m/Y')->label('Calendrier'),
                TextColumn::make('calendar.price')->label('Tarif')->money('EUR'),
                Tables\Columns\IconColumn::make('reduit_rate')->label('Tarif Réduit')->boolean(),
                Tables\Columns\IconColumn::make('status')->label('Statut')->boolean(),
                TextColumn::make('created_at')->dateTime()->label('Inscription'),
            ])
            ->filters([

            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListInscriptionFormations::route('/'),
            'create' => Pages\CreateInscriptionFormation::route('/create'),
            'edit' => Pages\EditInscriptionFormation::route('/{record}/edit'),

        ];
    }
}
