<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VerifyCodeResource\Pages;
use App\Filament\Resources\VerifyCodeResource\RelationManagers;
use App\Models\VerifyCode;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VerifyCodeResource extends Resource
{
    protected static ?string $model = VerifyCode::class;

    protected static ?string $pluralLabel = 'Codes pour Syllabus';


    protected static ?string $navigationGroup = 'Syllabus';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('code')
                    ->label('Code') // 🔹 Traduction
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('active')
                    ->label('Actif') // 🔹 Traduction
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code')
                    ->label('Code') // 🔹 Traduction
                    ->copyable() // 🔹 Activa el botón de copiar
                    ->copyMessage('Code copié !') // 🔹 Mensaje de confirmación
                    ->copyMessageDuration(1500) // 🔹 Duración en ms
                    ->searchable()
                    ->sortable(), // 🔹 Permite ordenar manualmente desde la tabla
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Utilisateur') // 🔹 Traduction
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.email')
                    ->label('Email') // 🔹 Traduction
                    ->searchable(),
                Tables\Columns\TextColumn::make('theme')
                    ->label('Theme') // 🔹 Traduction
                    ->searchable(),
                Tables\Columns\IconColumn::make('active')
                    ->label('Actif') // 🔹 Traduction
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Créé le') // 🔹 Traduction
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Mis à jour le') // 🔹 Traduction
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])

            ->filters([
                Tables\Filters\TernaryFilter::make('active')
                    ->label('Actif') // 🔹 Traduction
                    ->boolean(),
                Tables\Filters\SelectFilter::make('theme')
                    ->label('Thème')
                    ->options([
                        'theme1' => 'Theme 1',
                        'theme2' => 'Theme 2',
                        'theme3' => 'Theme 3',
                        'theme4' => 'Theme 4',
                        'theme5' => 'Theme 5',
                        'theme6' => 'Theme 6',
                        'theme7' => 'Theme 7',
                    ])// 🔹 Te crea opciones: Tous / Oui / Non
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('Modifier'), // 🔹 Traduction
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Supprimer la sélection'), // 🔹 Traduction
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
            'index' => Pages\ListVerifyCodes::route('/'),   // Liste
            'create' => Pages\CreateVerifyCode::route('/create'), // Créer
            'edit' => Pages\EditVerifyCode::route('/{record}/edit'), // Modifier
        ];
    }
}
