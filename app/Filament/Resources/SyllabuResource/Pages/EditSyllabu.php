<?php

namespace App\Filament\Resources\SyllabuResource\Pages;

use App\Filament\Resources\SyllabuResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSyllabu extends EditRecord
{
    protected static string $resource = SyllabuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
