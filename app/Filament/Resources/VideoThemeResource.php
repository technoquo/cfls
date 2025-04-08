<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VideoThemeResource\Pages;
use App\Filament\Resources\VideoThemeResource\RelationManagers;
use App\Models\Syllabu;
use App\Models\VideoTheme;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VideoThemeResource extends Resource
{
    protected static ?string $model = VideoTheme::class;

    protected static ?string $navigationLabel = 'Vidéo Thèmes';
    protected static ?string $label = 'Vidéo Thème';
    protected static ?string $navigationGroup = 'Syllabus';
    protected static ?int $navigationSort = 3;

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
                Forms\Components\Select::make('theme_id')
                    ->label('Theme')
                    ->required()
                    ->options(\App\Models\Theme::all()->pluck('title', 'id')->toArray())
                    ->searchable(),
                Forms\Components\Select::make('syllabu_id')
                    ->label('Syllabus')
                    ->required()
                    ->options(Syllabu::all()->pluck('title', 'id')->toArray())
                    ->required()
                    ->searchable(),
                Forms\Components\TextInput::make('code_video')
                    ->label('Code vidéo')
                    ->maxLength(255),
                Forms\Components\Toggle::make('active')
                    ->label('Statut')
                    ->required()
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Titre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('themes.title')
                    ->label('Thème')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('syllabus.title')
                    ->label('Syllabus')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('code_video')
                    ->label('Code vidéo')
                    ->searchable(),
                Tables\Columns\IconColumn::make('active')
                    ->label('Statut')
                    ->boolean()
                    ->sortable()


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
            'index' => Pages\ListVideoThemes::route('/'),
            'create' => Pages\CreateVideoTheme::route('/create'),
            'edit' => Pages\EditVideoTheme::route('/{record}/edit'),
        ];
    }
}
