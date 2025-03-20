<?php

namespace App\Filament\Resources\SoutienResource\Pages;

use App\Filament\Resources\SoutienResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSoutien extends EditRecord
{
    protected static string $resource = SoutienResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
