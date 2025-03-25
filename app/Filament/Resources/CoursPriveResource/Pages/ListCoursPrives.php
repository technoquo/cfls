<?php

namespace App\Filament\Resources\CoursPriveResource\Pages;

use App\Filament\Resources\CoursPriveResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCoursPrives extends ListRecords
{
    protected static string $resource = CoursPriveResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
