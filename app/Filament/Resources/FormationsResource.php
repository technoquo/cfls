<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Formations;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\FormationsResource\Pages;
use App\Filament\Resources\FormationsResource\RelationManagers;

class FormationsResource extends Resource
{
    protected static ?string $model = Formations::class;

    protected static ?string $navigationLabel = 'Formation';
    protected static ?string $label = 'Formation';
    protected static ?string $navigationGroup = 'Formations';
    protected static ?int $navigationSort = 3;


    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('title')
                ->label('Titre')
                ->required()
                ->live(onBlur: true) // Updates the slug as you type or on blur
                ->afterStateUpdated(function (callable $set, $state) {
                    $set('slug', \Illuminate\Support\Str::slug($state));
                })
                ->columnSpan(1),
                TextInput::make('slug')
                ->disabled() // Optional: prevents manual editing of the slug
                ->dehydrated(true),

            RichEditor::make('description')
                ->label('Description')
                ->required()
                ->columnSpan(2),
            FileUpload::make('image')
                ->label('Image')
                ->image()
                ->required()
                ->columnSpan(1),
            TextInput::make('buttom')
                ->label('Le nom du bouton'),
            Toggle::make('status')
                ->label('Actif')
                ->default(true)
                ->columnSpan(1),
            Repeater::make('information')
                ->relationship('info_formation')
                ->schema([
                    TextInput::make('title')
                        ->label('Titre')
                        ->maxLength(255)
                        ->columnSpan(1),
                    RichEditor::make('description')
                        ->label('Description')
                        ->maxLength(65535)
                        ->columnSpan(1),
                    Toggle::make('status')
                        ->label('Actif')
                        ->default(true)
                        ->columnSpan(1),
                ])
                ->itemLabel(fn (array $state): ?string => $state['title'] ?? null)
                ->addActionLabel('Ajouter un objectif')
                ->deletable()
                ->columns(2) // 2 columns inside Repeater
                ->columnSpan(2) // Repeater spans full width of main form
                ->extraAttributes(['class' => 'mt-4']), // Optional spacing
        ])
        ->columns(2); // 2 columns for the main form
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('title')
                 ->label('Titre')
                 ->searchable()
                 ->sortable(),
             TextColumn::make('description')
                 ->label('Description')
                 ->searchable()
                 ->html()
                 ->limit(40)
                 ->sortable(),
             ImageColumn::make('image')
                 ->label('Image'),
             IconColumn::make('status')
                 ->label('Actif')
                 ->boolean()

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
            'index' => Pages\ListFormations::route('/'),
            'create' => Pages\CreateFormations::route('/create'),
            'edit' => Pages\EditFormations::route('/{record}/edit'),
        ];
    }
}
