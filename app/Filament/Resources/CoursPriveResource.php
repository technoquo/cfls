<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\CoursPrive;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CoursPriveResource\Pages;
use App\Filament\Resources\CoursPriveResource\RelationManagers;

class CoursPriveResource extends Resource
{
    protected static ?string $model = CoursPrive::class;

    protected static ?string $navigationLabel = 'Cours Privé';
    protected static ?string $label = 'Cour Privé';
    protected static ?string $navigationGroup = 'Formations';
    protected static ?int $navigationSort = 4;


    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            RichEditor::make('description')
                ->label('Description')
                ->required()
                ->columnSpan(2),
            FileUpload::make('image')
                ->label('Image')
                ->image()
                ->required()
                ->columnSpan(1),
            Toggle::make('status')
                ->label('Actif')
                ->default(true)
                ->columnSpan(1),
            Hidden::make('formations_id')
                ->default(7), // Valor predefinido para formations_id

        ])
        ->columns(2); // 2 columns for the main form
    }
    public static function table(Table $table): Table
    {
        return $table
        ->columns([
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
            'index' => Pages\ListCoursPrives::route('/'),
            'create' => Pages\CreateCoursPrive::route('/create'),
            'edit' => Pages\EditCoursPrive::route('/{record}/edit'),
        ];
    }
}
