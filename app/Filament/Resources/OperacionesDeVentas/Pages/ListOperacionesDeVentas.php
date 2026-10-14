<?php

namespace App\Filament\Resources\OperacionesDeVentas\Pages;

use App\Filament\Resources\OperacionesDeVentas\OperacionesDeVentaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListOperacionesDeVentas extends ListRecords
{
    protected static string $resource = OperacionesDeVentaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
