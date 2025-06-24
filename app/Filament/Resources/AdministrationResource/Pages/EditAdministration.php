<?php

namespace App\Filament\Resources\AdministrationResource\Pages;

use App\Filament\Resources\AdministrationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Hash;

class EditAdministration extends EditRecord
{
    protected static string $resource = AdministrationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function afterSave(): void
    {
        $livewire = $this->form->getLivewire();

        $userName = $livewire->data['user_name'] ?? null;
        $userEmail = $livewire->data['user_email'] ?? null;
        $userPassword = $livewire->data['user_password'] ?? null;

        $record = $this->record;

        if ($record->user) {
            if ($userName) {
                $record->user->name = $userName;
            }

            if ($userEmail) {
                $record->user->email = $userEmail;
            }

            if (!empty($userPassword)) {
                $record->user->password = \Hash::make($userPassword);
            }

            $record->user->save();
        }
    }
}
