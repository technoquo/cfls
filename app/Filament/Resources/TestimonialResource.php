<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonialResource\Pages;
use App\Filament\Resources\TestimonialResource\RelationManagers;
use App\Models\Testimonial;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;

    protected static ?string $navigationLabel = 'Témoignage';
    protected static ?string $label = 'Témoignage';
    protected static ?string $navigationGroup = 'Gestion des sociétés';
    protected static ?int $navigationSort = 8;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('fullname')
                ->label('Nom et prénom')
                ->required(),
                Forms\Components\TextInput::make('testimony')
                ->label('témoignage')
                ->required(),
                Forms\Components\FileUpload::make('image')
                ->label('Image')
                ->acceptedFileTypes(['image/*']) // Optional: Restrict to specific file types
                ->image(),
                Forms\Components\Toggle::make('status')
                ->label('Statut')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                 TextColumn::make('fullname')
                 ->label('Nom et prénom')
                 ->searchable(),
                 TextColumn::make('testimony')
                 ->label('témoignage')
                 ->limit(40),
                 ImageColumn::make('image')
                 ->label('Image'),
                 IconColumn::make('status')
                 ->label('Statut')
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
            'index' => Pages\ListTestimonials::route('/'),
            'create' => Pages\CreateTestimonial::route('/create'),
            'edit' => Pages\EditTestimonial::route('/{record}/edit'),
        ];
    }
}
