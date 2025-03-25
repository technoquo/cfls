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
                ->required()
                ->locale('fr'),
            Forms\Components\DatePicker::make('date_end')
                ->required(),
            Forms\Components\DateTimePicker::make('hour_start')
            ->required()
            ->locale('fr')
            ->format('H:i')
            ->extraAttributes([
                'data-flatpickr' => json_encode([
                    'time_24hr' => true,  // Forces 24-hour format in the picker
                ]),
            ]),
            Forms\Components\DateTimePicker::make('hour_end')
                ->required()
                ->locale('fr')
                ->format('H:i'),
            Forms\Components\TextInput::make('inscription')
                ->numeric()
                ->default(0),
            Forms\Components\TextInput::make('open')
                ->numeric()
                ->default(1),
            Forms\Components\Toggle::make('status')
                ->default(true),
            Forms\Components\Hidden::make('formations_id')
                ->default(8)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('date_start')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('date_end')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('hour_start')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('hour_end')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('inscription'),
                Tables\Columns\TextColumn::make('open'),
                Tables\Columns\IconColumn::make('status')
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
