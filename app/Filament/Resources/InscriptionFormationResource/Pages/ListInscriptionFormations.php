<?php

namespace App\Filament\Resources\InscriptionFormationResource\Pages;

use App\Filament\Resources\InscriptionFormationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInscriptionFormations extends ListRecords
{
    protected static string $resource = InscriptionFormationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
