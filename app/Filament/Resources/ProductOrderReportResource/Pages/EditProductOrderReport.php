<?php

namespace App\Filament\Resources\ProductOrderReportResource\Pages;

use App\Filament\Resources\ProductOrderReportResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProductOrderReport extends EditRecord
{
    protected static string $resource = ProductOrderReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
