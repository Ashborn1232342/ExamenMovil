<?php

namespace App\Filament\Resources\OperacionesDeVentas\Pages;

use App\Filament\Resources\OperacionesDeVentas\OperacionesDeVentaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditOperacionesDeVenta extends EditRecord
{
    protected static string $resource = OperacionesDeVentaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
