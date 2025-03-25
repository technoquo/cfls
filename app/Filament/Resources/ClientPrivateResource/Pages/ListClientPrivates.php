<?php

namespace App\Filament\Resources\ClientPrivateResource\Pages;

use App\Filament\Resources\ClientPrivateResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListClientPrivates extends ListRecords
{
    protected static string $resource = ClientPrivateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
