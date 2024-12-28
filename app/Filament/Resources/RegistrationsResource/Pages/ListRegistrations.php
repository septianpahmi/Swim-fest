<?php

namespace App\Filament\Resources\RegistrationsResource\Pages;

use App\Filament\Resources\RegistrationsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRegistrations extends ListRecords
{
    protected static string $resource = RegistrationsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make()
            //     ->label("Tambah Registrasi"),
        ];
    }
}
