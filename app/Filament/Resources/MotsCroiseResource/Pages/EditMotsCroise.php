<?php

namespace App\Filament\Resources\MotsCroiseResource\Pages;

use App\Filament\Resources\MotsCroiseResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMotsCroise extends EditRecord
{
    protected static string $resource = MotsCroiseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
