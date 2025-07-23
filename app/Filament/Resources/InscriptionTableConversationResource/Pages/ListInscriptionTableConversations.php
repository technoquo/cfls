<?php

namespace App\Filament\Resources\InscriptionTableConversationResource\Pages;

use App\Filament\Resources\InscriptionTableConversationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInscriptionTableConversations extends ListRecords
{
    protected static string $resource = InscriptionTableConversationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
