<?php

namespace App\Filament\Resources\DonResource\Pages;

use App\Filament\Resources\DonResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDons extends ListRecords
{
    protected static string $resource = DonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
