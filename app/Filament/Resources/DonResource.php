<?php

namespace App\Filament\Resources;

use App\Models\Don;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\DonResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DonResource\RelationManagers;
use BladeUI\Icons\Components\Icon;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;

class DonResource extends Resource
{
    protected static ?string $model = Don::class;

    protected static ?string $navigationLabel = 'Don';
    protected static ?string $label = 'Don';
    protected static ?string $navigationGroup = 'Gestion des sociétés';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label('Titre')
                    ->required(),
                Forms\Components\RichEditor::make('description')
                    ->label('Description')
                    ->required(),
                FileUpload::make('image')
                    ->label('Image')
                    ->image()
                    ->required(),
                TextInput::make('video_url')
                    ->label('URL de la vidéo'),
                Toggle::make('status')
                    ->label('Status')
                    ->default(false),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                ->label('Titre')
                ->searchable(),
              Tables\Columns\TextColumn::make('description')
                ->label('Description')
                ->html()
                ->searchable()
                ->limit(80),
              Tables\Columns\ImageColumn::make('image')
                ->label('Image')
                ->searchable(),
                Tables\Columns\IconColumn::make('status')
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
            'index' => Pages\ListDons::route('/'),
            'create' => Pages\CreateDon::route('/create'),
            'edit' => Pages\EditDon::route('/{record}/edit'),
        ];
    }
}
