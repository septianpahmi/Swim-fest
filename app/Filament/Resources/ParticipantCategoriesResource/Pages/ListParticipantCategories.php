<?php

namespace App\Filament\Resources\ParticipantCategoriesResource\Pages;

use App\Filament\Resources\ParticipantCategoriesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListParticipantCategories extends ListRecords
{
    protected static string $resource = ParticipantCategoriesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
