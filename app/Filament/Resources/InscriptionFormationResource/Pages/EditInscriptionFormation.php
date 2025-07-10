<?php

namespace App\Filament\Resources\InscriptionFormationResource\Pages;

use App\Filament\Resources\InscriptionFormationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInscriptionFormation extends EditRecord
{
    protected static string $resource = InscriptionFormationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
