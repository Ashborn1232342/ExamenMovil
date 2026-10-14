<?php

namespace App\Filament\Resources\Proveedores\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProveedoresForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre')
                    ->required(),
                TextInput::make('email')
                    ->label('Correo electrónico')
                    ->email()
                    ->unique(ignoreRecord: true)
                    ->required(),
                TextInput::make('direccion')
                    ->required(),
                TextInput::make('telefono')
                    ->tel()
                    ->required(),
                Select::make('estado')
                    ->options(['activo' => 'Activo', 'inactivo' => 'Inactivo'])
                    ->required()
                    ->default('activo'),
                Select::make('comercio_id')
                    ->label('Comercio')
                    ->relationship('comercio', 'nombre')
                    ->searchable()
                    ->preload()
                    ->required(),
            ]);
    }
}
