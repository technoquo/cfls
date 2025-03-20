<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Soutien;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\SoutienResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SoutienResource\RelationManagers;


class SoutienResource extends Resource
{
    protected static ?string $model = Soutien::class;


    protected static ?string $navigationLabel = 'Soutien';
    protected static ?string $label = 'Soutien';
    protected static ?string $navigationGroup = 'Gestion des sociétés';
    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nom')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('image')
                    ->label('Image')
                    ->acceptedFileTypes(['image/*']) // Optional: Restrict to specific file types
                    ->image()
                    ->required(),
                Forms\Components\TextInput::make('url')
                    ->label('URL')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('status')
                    ->label('Statut')
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('name')->label('Name'),
            ImageColumn::make('image')->label('Image'),
            TextColumn::make('url')->label('URL'),
            IconColumn::make('status')
            ->label('Statut')
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSoutiens::route('/'),
            'create' => Pages\CreateSoutien::route('/create'),
            'edit' => Pages\EditSoutien::route('/{record}/edit'),
        ];
    }
}
