<?php

namespace App\Filament\Resources\OrganeResource\Pages;

use App\Filament\Resources\OrganeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrgane extends EditRecord
{
    protected static string $resource = OrganeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
