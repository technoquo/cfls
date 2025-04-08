<?php

namespace App\Filament\Resources\VimeoResource\Pages;

use App\Filament\Resources\VimeoResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\QueryException;

class CreateVimeo extends CreateRecord
{
    protected static string $resource = VimeoResource::class;

    protected function handleRecordCreation(array $data): \Illuminate\Database\Eloquent\Model
    {
        try {
            // Attempt to create the record
            return parent::handleRecordCreation($data);
        } catch (QueryException $e) {
            // Check if the exception is due to a duplicate entry (error code 23000)
            if ($e->getCode() === '23000' && str_contains($e->getMessage(), 'vimeos_slug_unique')) {
                // Send a notification to the user
                Notification::make()
                    ->title('Error')
                    ->body('The slug "' . $data['slug'] . '" is already taken. Please choose a different title or slug.')
                    ->danger()
                    ->send();

                // Re-throw the exception to prevent the form from saving
                throw $e;
            }

            // If it's a different error, re-throw it
            throw $e;
        }
    }
}