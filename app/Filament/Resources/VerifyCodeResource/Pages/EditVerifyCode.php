<?php

namespace App\Filament\Resources\VerifyCodeResource\Pages;

use App\Filament\Resources\VerifyCodeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVerifyCode extends EditRecord
{
    protected static string $resource = VerifyCodeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
