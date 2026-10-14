<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comercios extends Model
{
    /** @use HasFactory<\Database\Factories\ComerciosFactory> */
    use HasFactory;
    
    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'email',
        'estado',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function clientes(): HasMany
    {
        return $this->hasMany(Clientes::class, 'comercio_id');
    }

    public function productos(): HasMany
    {
        return $this->hasMany(Productos::class, 'comercio_id');
    }

    public function proveedores(): HasMany
    {
        return $this->hasMany(Proveedores::class, 'comercio_id');
    }
}
