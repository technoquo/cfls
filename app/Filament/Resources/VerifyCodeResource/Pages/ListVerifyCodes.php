<?php

namespace App\Filament\Resources\VerifyCodeResource\Pages;

use App\Filament\Resources\VerifyCodeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVerifyCodes extends ListRecords
{
    protected static string $resource = VerifyCodeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
