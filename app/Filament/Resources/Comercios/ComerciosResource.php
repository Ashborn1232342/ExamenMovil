<?php

namespace App\Filament\Resources\Comercios;

use App\Filament\Resources\Comercios\Pages\CreateComercios;
use App\Filament\Resources\Comercios\Pages\EditComercios;
use App\Filament\Resources\Comercios\Pages\ListComercios;
use App\Filament\Resources\Comercios\Schemas\ComerciosForm;
use App\Filament\Resources\Comercios\Tables\ComerciosTable;
use App\Models\Comercios;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ComerciosResource extends Resource
{
    protected static ?string $model = Comercios::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nombre';

    public static function form(Schema $schema): Schema
    {
        return ComerciosForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ComerciosTable::configure($table);
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
            'index' => ListComercios::route('/'),
            'create' => CreateComercios::route('/create'),
            'edit' => EditComercios::route('/{record}/edit'),
        ];
    }
}
