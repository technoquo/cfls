<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\History;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\HistoryResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\HistoryResource\RelationManagers;
use Str;

class HistoryResource extends Resource
{

    protected static ?string $model = History::class;

    protected static ?string $navigationLabel = 'Historie';
    protected static ?string $label = 'Historie';
    protected static ?string $navigationGroup = 'Gestion des sociétés';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                 TextInput::make('title')
                    ->label('Titre')
                    ->required(),
                Forms\Components\RichEditor::make('description')
                    ->label('')
                    ->required(),
                TextInput::make('video')
                    ->label('Url de la vidéo')
                    ->required(),
                Toggle::make('status')
                    ->label('Statut')
                    ->required(),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
               TextColumn::make('title')
                    ->searchable()
                    ->label('Titre'),
                TextColumn::make('description')
                    ->sortable()
                    ->searchable()
                    ->label('Description')
                    ->limit(80)
                    ->html(),

               IconColumn::make('status')
                    ->label('Statut')
                    ->boolean(),
                //
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
            'index' => Pages\ListHistories::route('/'),
            'create' => Pages\CreateHistory::route('/create'),
            'edit' => Pages\EditHistory::route('/{record}/edit'),
        ];
    }
}
