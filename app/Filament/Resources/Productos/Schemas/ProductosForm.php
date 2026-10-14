<?php

namespace App\Filament\Resources\Productos\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ProductosForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre')
                    ->required(),
                Textarea::make('descripcion')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('precio')
                    ->required()
                    ->numeric()
                    ->minValue(0),
                TextInput::make('stock')
                    ->required()
                    ->integer()
                    ->minValue(0),
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
