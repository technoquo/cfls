<?php

namespace App\Filament\Resources\FormationsResource\Pages;

use App\Filament\Resources\FormationsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFormations extends ListRecords
{
    protected static string $resource = FormationsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
