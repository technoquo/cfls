<?php

namespace App\Filament\Resources\MotsCroiseResource\Pages;

use App\Filament\Resources\MotsCroiseResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMotsCroises extends ListRecords
{
    protected static string $resource = MotsCroiseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
