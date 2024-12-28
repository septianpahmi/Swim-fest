<?php

namespace App\Filament\Resources\RegistrationsResource\Pages;

use App\Filament\Resources\RegistrationsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRegistrations extends EditRecord
{
    protected static string $resource = RegistrationsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
