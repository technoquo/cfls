<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\ClientPrivate;
use Filament\Resources\Resource;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ClientPrivateResource\Pages;
use App\Filament\Resources\ClientPrivateResource\RelationManagers;

class ClientPrivateResource extends Resource
{
    protected static ?string $model = ClientPrivate::class;

    
    protected static ?string $navigationLabel = 'Clients privés';
    protected static ?string $label = 'Clients privés';   
    protected static ?string $navigationGroup = 'Formations';
    protected static ?int $navigationSort = 3;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            TextInput::make('name')
                ->label('Nom')
                ->required(),
             FileUpload::make('image')
                ->label('Image')
                ->image()
                ->required()
                ->columnSpan(1),
            TextInput::make('url')
                    ->label('URL')
                    ->required()
                    ->maxLength(255),
            Toggle::make('status')
                ->label('Actif')
                ->default(true)
                ->columnSpan(1),
             Hidden::make('formations_id')
                ->default(7)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Nom'),
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
            'index' => Pages\ListClientPrivates::route('/'),
            'create' => Pages\CreateClientPrivate::route('/create'),
            'edit' => Pages\EditClientPrivate::route('/{record}/edit'),
        ];
    }
}
