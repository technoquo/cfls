<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrganeResource\Pages;
use App\Filament\Resources\OrganeResource\RelationManagers;
use App\Models\Organe;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrganeResource extends Resource
{
    protected static ?string $model = Organe::class;

    protected static ?string $navigationLabel = 'Organe';
    protected static ?string $label = 'Organe';   
    protected static ?string $navigationGroup = 'Organisation';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                ->label('Organe')
                ->required()
                ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Organe')
                ->searchable(),
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
            'index' => Pages\ListOrganes::route('/'),
            'create' => Pages\CreateOrgane::route('/create'),
            'edit' => Pages\EditOrgane::route('/{record}/edit'),
        ];
    }
}
