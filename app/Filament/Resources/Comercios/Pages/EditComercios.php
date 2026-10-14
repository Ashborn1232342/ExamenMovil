<?php

namespace App\Filament\Resources\Comercios\Pages;

use App\Filament\Resources\Comercios\ComerciosResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditComercios extends EditRecord
{
    protected static string $resource = ComerciosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
