<?php

namespace App\Filament\Widgets;

use App\Models\Clientes;
use App\Models\Comercios;
use App\Models\OperacionesDeVenta;
use App\Models\Productos;
use App\Models\Proveedores;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Clientes', Clientes::count())
                ->description(Clientes::where('estado', 'activo')->count() . ' activos'),
            Stat::make('Comercios', Comercios::count())
                ->description(Comercios::where('estado', 'activo')->count() . ' activos'),
            Stat::make('Productos', Productos::count())
                ->description(Productos::where('estado', 'activo')->count() . ' activos'),
            Stat::make('Proveedores', Proveedores::count())
                ->description(Proveedores::where('estado', 'activo')->count() . ' activos'),
            Stat::make('Operaciones de venta', OperacionesDeVenta::count())
                ->description(OperacionesDeVenta::where('estado', 'activo')->count() . ' activas'),
        ];
    }
}
