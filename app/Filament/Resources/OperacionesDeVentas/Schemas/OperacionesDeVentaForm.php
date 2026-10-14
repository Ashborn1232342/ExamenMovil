<?php

namespace App\Filament\Resources\OperacionesDeVentas\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class OperacionesDeVentaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('cantidad')
                    ->integer()
                    ->minValue(1)
                    ->required(),
                TextInput::make('precio_unitario')
                    ->numeric()
                    ->minValue(0)
                    ->required(),
                TextInput::make('total')
                    ->numeric()
                    ->minValue(0)
                    ->required(),
                Select::make('producto_id')
                    ->label('Producto')
                    ->relationship('producto', 'nombre')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('cliente_id')
                    ->label('Cliente')
                    ->relationship('cliente', 'nombre')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('estado')
                    ->options(['activo' => 'Activo', 'inactivo' => 'Inactivo'])
                    ->default('activo')
                    ->required(),
            ]);
    }
}
