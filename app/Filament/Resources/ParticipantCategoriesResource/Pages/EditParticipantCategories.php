<?php

namespace App\Filament\Resources\ParticipantCategoriesResource\Pages;

use App\Filament\Resources\ParticipantCategoriesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditParticipantCategories extends EditRecord
{
    protected static string $resource = ParticipantCategoriesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
