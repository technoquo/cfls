<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Tables;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use App\Models\InscriptionFormation;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;

class InscriptionFormationReport extends Page implements HasTable
{
    use InteractsWithTable;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static string $view = 'filament.pages.inscription-formation-report';
    protected static ?string $title = 'Rapport des Inscriptions';
    protected static ?string $navigationLabel = 'Rapport des Inscriptions';
    protected static ?string $slug = 'rapport-inscriptions';
    protected static ?int $navigationSort = 3;

    public function getTableQuery(): Builder
    {
        return InscriptionFormation::query()->with(['user', 'formation', 'calendar', 'level']);
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('user.name')->label('Utilisateur'),
            Tables\Columns\TextColumn::make('formation.title')->label('Formation'),
            Tables\Columns\TextColumn::make('level.name')->label('Niveau'),
            Tables\Columns\TextColumn::make('calendar.start_date')->label('Calendrier')->date('d/m/Y'),
            Tables\Columns\IconColumn::make('reduit_rate')->label('Tarif Réduit')->boolean(),
            Tables\Columns\TextColumn::make('created_at')->label('Inscrit le')->dateTime(),
        ];
    }

    protected function getTableFilters(): array
    {
        return [
            Tables\Filters\SelectFilter::make('level_id')
                ->label('Niveau')
                ->relationship('level', 'name'),
        ];
    }

    protected function getTableHeaderActions(): array
    {
        return [
            ExportAction::make('export_all')
                ->label('Exporter tout')
        ];
    }
}
