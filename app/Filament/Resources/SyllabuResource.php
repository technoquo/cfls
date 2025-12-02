<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SyllabuResource\Pages;
use App\Filament\Resources\SyllabuResource\RelationManagers;
use App\Models\Syllabu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SyllabuResource extends Resource
{
    protected static ?string $model = Syllabu::class;

    protected static ?string $navigationLabel = 'Syllabus';
    protected static ?string $label = 'Syllabus';
    protected static ?string $navigationGroup = 'Syllabus';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Titre')
                    ->required()
                    ->maxLength(255)
                    ->required()
                    ->live(onBlur: true) // Updates the slug as you type or on blur
                    ->afterStateUpdated(function (callable $set, $state) {
                        $set('slug', \Illuminate\Support\Str::slug($state));
                    }),
                Forms\Components\TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('image')
                    ->label('Image')
                    ->image()
                    ->required()
                    ->maxSize(1024),
                Forms\Components\Toggle::make('status')
                    ->label('Statut')
                    ->required(),
                Forms\Components\TextInput::make('link')
                    ->label('Lien')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSyllabus::route('/'),
            'create' => Pages\CreateSyllabu::route('/create'),
            'edit' => Pages\EditSyllabu::route('/{record}/edit'),
        ];
    }
}
