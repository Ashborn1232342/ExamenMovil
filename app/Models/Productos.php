<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Productos extends Model
{
    /** @use HasFactory<\Database\Factories\ProductosFactory> */
    use HasFactory;
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'estado',
        'comercio_id',
    ];

    public function comercio(): BelongsTo
    {
        return $this->belongsTo(Comercios::class, 'comercio_id');
    }

    public function operacionesDeVenta(): HasMany
    {
        return $this->hasMany(OperacionesDeVenta::class, 'producto_id');
    }
}
