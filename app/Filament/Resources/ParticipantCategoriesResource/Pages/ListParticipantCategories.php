<?php

namespace App\Filament\Resources\ParticipantCategoriesResource\Pages;

use App\Filament\Resources\ParticipantCategoriesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use pxlrbt\FilamentExcel\Actions\Pages\ExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;

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
