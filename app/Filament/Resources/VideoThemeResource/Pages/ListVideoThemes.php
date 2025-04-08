<?php

namespace App\Filament\Resources\VideoThemeResource\Pages;

use App\Filament\Resources\VideoThemeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVideoThemes extends ListRecords
{
    protected static string $resource = VideoThemeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
