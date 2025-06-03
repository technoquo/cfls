<?php

namespace App\Filament\Resources;

use Dom\Text;
use Filament\Forms;
use Filament\Tables;
use App\Models\Member;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use BladeUI\Icons\Components\Icon;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Log;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\FileDownloadColumn;
use App\Filament\Resources\MemberResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\MemberResource\RelationManagers;


class MemberResource extends Resource
{
    protected static ?string $model = Member::class;

    protected static ?string $navigationLabel = 'Membres';
    protected static ?string $label = 'Membres';
    protected static ?string $navigationGroup = 'Gestion des sociétés';
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('title')
                ->label('Titre')
                ->required(),
            TextInput::make('subtitle')
                ->label('Sous-titre')
                ->required(),
            RichEditor::make('description')
                ->label('Description')
                ->required(),
            FileUpload::make('image')
                ->label('Image')
                ->acceptedFileTypes(['image/*']) // Optional: Restrict to specific file types
                ->image()
                ->required(),
            FileUpload::make('download')
            ->label('Téléchargement')
            ->acceptedFileTypes(['application/pdf'])
            ->maxSize(5120) // Increased to 5MB for testing
            ->required()
            ->preserveFilenames()
            ->disk('public') // Ensure it’s stored in a known disk
            ->directory('uploads') // Optional: Custom directory
            ->afterStateUpdated(function ($state) {
                if ($state) {
                    Log::info('File uploaded:', [
                        'size' => $state->getSize(),
                        'original_name' => $state->getClientOriginalName(),
                    ]);
                }
            }),
          TextInput::make('video_url')
              ->label('Video URL'),
          Toggle::make('status')
            ->label('Statut')
            ->default(true),
        ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Titre')
                    ->searchable(),
                TextColumn::make('subtitle')
                    ->label('Sous-titre')
                    ->limit(40)
                    ->searchable(),
                TextColumn::make('description')
                    ->label('Description')
                    ->searchable()
                    ->html()
                    ->limit(40),
                Tables\Columns\ImageColumn::make('image')
                    ->label('Image')
                    ->searchable(),
                    TextColumn::make('download')
                    ->label('Téléchargement')
                    ->formatStateUsing(fn ($record) => basename($record->download)) // Show filename
                    ->action(
                        Action::make('download')
                        ->label('Téléchargement')
                        ->action(fn ($record) => Storage::disk('public')->download($record->download))
                    ),
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
            'index' => Pages\ListMembers::route('/'),
            'create' => Pages\CreateMember::route('/create'),
            'edit' => Pages\EditMember::route('/{record}/edit'),
        ];
    }
}
