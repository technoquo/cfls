<?php

namespace App\Filament\Resources\TableConversationResource\Pages;

use App\Filament\Resources\TableConversationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTableConversation extends EditRecord
{
    protected static string $resource = TableConversationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
