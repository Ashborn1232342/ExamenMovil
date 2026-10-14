<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Clientes extends Model
{
    /** @use HasFactory<\Database\Factories\ClientesFactory> */
    use HasFactory;
    protected $fillable = [
        'nombre',
        'email',
        'direccion',
        'telefono',
        'estado',
        'comercio_id',
    ];

    public function comercio(): BelongsTo
    {
        return $this->belongsTo(Comercios::class, 'comercio_id');
    }

    public function operacionesDeVenta(): HasMany
    {
        return $this->hasMany(OperacionesDeVenta::class, 'cliente_id');
    }
}
