<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TableConversationResource\Pages;
use App\Filament\Resources\TableConversationResource\RelationManagers;
use App\Models\TableConversation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TableConversationResource extends Resource
{
    protected static ?string $model = TableConversation::class;

    protected static ?string $navigationLabel = 'Tables de conversation';
    protected static ?string $label = 'Tables de conversation';
    protected static ?string $navigationGroup = 'Formations';
    protected static ?int $navigationSort = 4;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('date_start')
                    ->label('date de début')
                    ->required(),               
                Forms\Components\TextInput::make('hour_start')
                    ->label('Heure de début')
                    ->required()
                    ->inputMode('numeric') // Suggests numeric keyboard on mobile
                    ->mask('99:99') // Enforces HH:MM pattern (e.g., 14:30)
                    ->placeholder('HH:MM') // Visual hint for the user
                    ->rules(['regex:/^([01]?[0-9]|2[0-3]):[0-5][0-9]$/']),  
                Forms\Components\TextInput::make('hour_end')
                    ->label('Heure de fin')
                    ->required()
                    ->inputMode('numeric') // Suggests numeric keyboard on mobile
                    ->mask('99:99') // Enforces HH:MM pattern (e.g., 14:30)
                    ->placeholder('HH:MM') // Visual hint for the user
                    ->rules(['regex:/^([01]?[0-9]|2[0-3]):[0-5][0-9]$/']),             
                Forms\Components\TextInput::make('price')
                    ->label('prix')
                    ->numeric()
                    ->default(0)
                    ->suffix('€'),
                Forms\Components\TextInput::make('inscription')
                    ->label('inscription')
                    ->numeric()
                    ->default(0),
                Forms\Components\Toggle::make('open')
                    ->label('Ouverture')
                    ->default(true) // Sets the toggle to "on" by default
                    ->required(), //
                Forms\Components\Toggle::make('status')
                    ->label('statut')
                    ->default(true),
                Forms\Components\Hidden::make('formations_id')
                    ->default(8)
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('date_start')
                    ->label('Date de début')
                    ->date()
                    ->searchable()
                    ->sortable(),              
                Tables\Columns\TextColumn::make('hour_start')
                    ->label('Heure de début')
                    ->time('H:i A')
                    ->searchable()
                    ->sortable(),           
                Tables\Columns\TextColumn::make('inscription')
                    ->searchable()
                    ->label('Inscription'),
                Tables\Columns\IconColumn::make('open')
                    ->searchable()
                    ->boolean()
                    ->label('Ouverture'),
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
            'index' => Pages\ListTableConversations::route('/'),
            'create' => Pages\CreateTableConversation::route('/create'),
            'edit' => Pages\EditTableConversation::route('/{record}/edit'),
        ];
    }
}
