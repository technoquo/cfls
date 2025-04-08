<?php

namespace App\Filament\Resources\SyllabuResource\Pages;

use App\Filament\Resources\SyllabuResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSyllabus extends ListRecords
{
    protected static string $resource = SyllabuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
