<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Faker\Core\File;
use Filament\Forms\Components\TextInput;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Administration;
use Illuminate\Support\Facades\Hash;
use Tables\Columns\TextColumn;
use Tables\Columns\ImageColumn;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AdministrationResource\Pages;
use App\Filament\Resources\AdministrationResource\RelationManagers;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Toggle;


class AdministrationResource extends Resource
{
    protected static ?string $model = Administration::class;

    protected static ?string $navigationLabel = 'Administrateurs';
    protected static ?string $label = 'Administrateurs';
    protected static ?string $navigationGroup = 'Organisation';
    protected static ?int $navigationSort = 3;


public static function form(Form $form): Form
{
    return $form->schema([
        Group::make([
            Section::make('Informations personnelles')
                ->schema([
                    TextInput::make('user_name')
                        ->label('Nom')
                        ->required()
                        ->dehydrated(false) // <- evita que se guarde en administrations
                        ->afterStateHydrated(function (\Filament\Forms\Components\TextInput $component, $state) {
                            $record = $component->getContainer()->getParentComponent()?->getRecord();
                            $component->state($record?->user?->name ?? '');
                        }),

                    TextInput::make('user_email')
                        ->label('Email')
                        ->email()
                        ->required()
                        ->dehydrated(false) // <- evita que se guarde en administrations
                        ->afterStateHydrated(function (\Filament\Forms\Components\TextInput $component, $state) {
                            $record = $component->getContainer()->getParentComponent()?->getRecord();
                            $component->state($record?->user?->email ?? '');
                        }),

                    TextInput::make('user_password')
                        ->label('Nouveau mot de passe')
                        ->password()
                        ->dehydrated(fn ($state) => filled($state))
                        ->afterStateHydrated(fn($component) => $component->state(''))
                        ->minLength(6),

                    Select::make('position_id')
                        ->label('Fonction')
                        ->relationship('position', 'name')
                        ->required(),

                    Select::make('organe_id')
                        ->label('Organe')
                        ->relationship('organe', 'name')
                        ->required(),

                    FileUpload::make('image')
                        ->image()
                        ->label('Photo')
                        ->required(),

                    FileUpload::make('image_two')
                        ->image()
                        ->label('Image 2')
                        ->required(),

                    FileUpload::make('image_three')
                        ->image()
                        ->label('Image 3')
                        ->required(),

                    Toggle::make('status')
                        ->label('Actif')
                        ->default(true),
                ])
                ->columns(2),
        ])
    ]);
}


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Nom')
                    ->searchable(),
                Tables\Columns\TextColumn::make('position.name')
                    ->label('Fonction')
                    ->searchable(),
                Tables\Columns\TextColumn::make('organe.name')
                    ->label('Organe')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image')
                    ->label('Photo'),
                Tables\Columns\IconColumn::make('status')
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

    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        return parent::getEloquentQuery()->with('user');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAdministrations::route('/'),
            'create' => Pages\CreateAdministration::route('/create'),
            'edit' => Pages\EditAdministration::route('/{record}/edit'),
        ];
    }
}
