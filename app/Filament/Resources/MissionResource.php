<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MissionResource\Pages;
use App\Filament\Resources\MissionResource\RelationManagers;
use App\Models\Mission;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MissionResource extends Resource
{
    protected static ?string $model = Mission::class;

    protected static ?string $navigationLabel = 'Le CFLS, c\'est';
    protected static ?string $label = 'Le CFLS, c\'est';   
    protected static ?string $navigationGroup = 'Gestion des sociétés';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Titre')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('video')
                    ->label('Vidéo')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('status')
                    ->label('Statut')
                    ->required(),
                Forms\Components\Repeater::make('objectifs') // Nombre de la relación
                    ->relationship('objectives') // Vincula con la relación hasMany
                    ->schema([
                        Forms\Components\TextInput::make('title') // Campo del Objective
                            ->label('Objectif Nom')
                            ->required()
                            ->maxLength(255),
                        // Agrega más campos de Objective según necesites
                        Forms\Components\Textarea::make('description')
                            ->label('Description')
                            ->maxLength(65535),
                    ])
                    ->columns(2) // Opcional: organiza los campos en 2 columnas
                    ->itemLabel(fn (array $state): ?string => $state['title'] ?? null) // Etiqueta para cada ítem
                    ->addActionLabel('Ajouter un objectif') // Texto del botón para agregar
                    ->deletable() // Permite eliminar objetivos
                    
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('video')
                    ->searchable(),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
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
            // Opcional: Si prefieres un Relation Manager separado
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMissions::route('/'),
            'create' => Pages\CreateMission::route('/create'),
            'edit' => Pages\EditMission::route('/{record}/edit'),
        ];
    }
}