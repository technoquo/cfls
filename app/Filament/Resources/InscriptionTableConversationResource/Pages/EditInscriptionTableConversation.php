<?php

namespace App\Filament\Resources\InscriptionTableConversationResource\Pages;

use App\Filament\Resources\InscriptionTableConversationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInscriptionTableConversation extends EditRecord
{
    protected static string $resource = InscriptionTableConversationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
