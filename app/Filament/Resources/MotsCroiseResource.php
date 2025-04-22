<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MotsCroiseResource\Pages;
use App\Filament\Resources\MotsCroiseResource\RelationManagers;
use App\Models\MotsCroise;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MotsCroiseResource extends Resource
{
    protected static ?string $model = MotsCroise::class;
    protected static ?string $navigationLabel = 'Mots croisés';
    protected static ?string $label = 'Mots croisés';
    protected static ?string $navigationGroup = 'Vidéos';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('code_vimeo')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('image_mot')
                    ->image()
                    ->required(),
                Forms\Components\FileUpload::make('image_solution')
                    ->image()
                    ->required(),
                Forms\Components\FileUpload::make('pdf')
                    ->label('PDF')
                    ->required()
                    ->acceptedFileTypes(['application/pdf'])
                    ->maxSize(1024),
                Forms\Components\Toggle::make('status')
                    ->label('Actif')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image_mot'),
                Tables\Columns\ImageColumn::make('image_solution'),
                Tables\Columns\TextColumn::make('code_vimeo')
                    ->searchable(),
                Tables\Columns\IconColumn::make('status')
                    ->label('Actif')
                    ->boolean()
                    ->trueIcon('heroicon-o-check')
                    ->falseIcon('heroicon-o-x-mark')
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
            'index' => Pages\ListMotsCroises::route('/'),
            'create' => Pages\CreateMotsCroise::route('/create'),
            'edit' => Pages\EditMotsCroise::route('/{record}/edit'),
        ];
    }
}
