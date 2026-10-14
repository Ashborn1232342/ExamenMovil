<?php

namespace App\Filament\Resources\Comercios\Pages;

use App\Filament\Resources\Comercios\ComerciosResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListComercios extends ListRecords
{
    protected static string $resource = ComerciosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
