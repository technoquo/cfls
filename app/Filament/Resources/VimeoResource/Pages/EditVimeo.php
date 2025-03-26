<?php

namespace App\Filament\Resources\VimeoResource\Pages;

use App\Filament\Resources\VimeoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVimeo extends EditRecord
{
    protected static string $resource = VimeoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
