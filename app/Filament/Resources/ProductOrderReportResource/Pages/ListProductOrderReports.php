<?php

namespace App\Filament\Resources\ProductOrderReportResource\Pages;

use App\Filament\Resources\ProductOrderReportResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProductOrderReports extends ListRecords
{
    protected static string $resource = ProductOrderReportResource::class;

    protected function getHeaderActions(): array
    {
        return []; // No se permite crear desde esta vista
    }
}
