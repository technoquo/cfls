<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyResource\Pages;
use App\Filament\Resources\CompanyResource\RelationManagers;
use App\Models\Company;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CompanyResource extends Resource
{
    protected static ?string $model = Company::class;


    protected static ?string $navigationLabel = 'Sociétés';
    protected static ?string $label = 'Société';
    protected static ?string $navigationGroup = 'Gestion des sociétés';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nom de la société')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->label('Logo de la société'),
                Forms\Components\FileUpload::make('image_event')
                    ->image()
                    ->label('Logo de la société'),
                Forms\Components\Textarea::make('description')
                    ->label('Description de la société')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->label('Email de la société')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('mobile')
                    ->tel()
                    ->label('Téléphone mobile de la société')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('address')
                    ->label('Adresse de la société')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('city')
                    ->label('Ville de la société')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('state')
                    ->label('Province de la société')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('zip')
                    ->label('Code postal de la société')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('scheduler')
                    ->label('Horaires de la société')
                    ->columnSpanFull(),
                Forms\Components\RichEditor::make('transport')
                    ->label('Transport de la société')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('website')
                    ->label('Site web de la société')
                    ->maxLength(255),
                Forms\Components\TextInput::make('facebook')
                    ->label('Facebook de la société')
                    ->maxLength(255),
                Forms\Components\TextInput::make('instagram')
                    ->label('Instagram de la société')
                    ->maxLength(255),
                Forms\Components\Textarea::make('googlemap')
                    ->label('Google map de la société')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('bank')
                    ->label('Banque de la société')
                    ->maxLength(255),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mobile')
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
            'index' => Pages\ListCompanies::route('/'),
            'create' => Pages\CreateCompany::route('/create'),
            'edit' => Pages\EditCompany::route('/{record}/edit'),
        ];
    }
}
