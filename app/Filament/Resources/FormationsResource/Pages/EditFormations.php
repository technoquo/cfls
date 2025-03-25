<?php

namespace App\Filament\Resources\FormationsResource\Pages;

use App\Filament\Resources\FormationsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFormations extends EditRecord
{
    protected static string $resource = FormationsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
