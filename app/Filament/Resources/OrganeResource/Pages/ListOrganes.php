<?php

namespace App\Filament\Resources\OrganeResource\Pages;

use App\Filament\Resources\OrganeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOrganes extends ListRecords
{
    protected static string $resource = OrganeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
