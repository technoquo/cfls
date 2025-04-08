<?php

namespace App\Filament\Resources\VideoThemeResource\Pages;

use App\Filament\Resources\VideoThemeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVideoTheme extends EditRecord
{
    protected static string $resource = VideoThemeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
