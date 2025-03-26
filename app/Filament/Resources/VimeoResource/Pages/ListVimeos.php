<?php

namespace App\Filament\Resources\VimeoResource\Pages;

use App\Filament\Resources\VimeoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVimeos extends ListRecords
{
    protected static string $resource = VimeoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
