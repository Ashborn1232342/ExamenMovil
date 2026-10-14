<?php

namespace App\Filament\Resources\OperacionesDeVentas;

use App\Filament\Resources\OperacionesDeVentas\Pages\CreateOperacionesDeVenta;
use App\Filament\Resources\OperacionesDeVentas\Pages\EditOperacionesDeVenta;
use App\Filament\Resources\OperacionesDeVentas\Pages\ListOperacionesDeVentas;
use App\Filament\Resources\OperacionesDeVentas\Schemas\OperacionesDeVentaForm;
use App\Filament\Resources\OperacionesDeVentas\Tables\OperacionesDeVentasTable;
use App\Models\OperacionesDeVenta;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class OperacionesDeVentaResource extends Resource
{
    protected static ?string $model = OperacionesDeVenta::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'total';

    public static function form(Schema $schema): Schema
    {
        return OperacionesDeVentaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OperacionesDeVentasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListOperacionesDeVentas::route('/'),
            'create' => CreateOperacionesDeVenta::route('/create'),
            'edit' => EditOperacionesDeVenta::route('/{record}/edit'),
        ];
    }
}
