<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OperacionesDeVenta extends Model
{
    use HasFactory;

    protected $table = 'operaciones_de__ventas';

    protected $fillable = [
        'cantidad',
        'precio_unitario',
        'total',
        'estado',
        'producto_id',
        'cliente_id',
    ];

    protected function casts(): array
    {
        return [
            'cantidad' => 'integer',
            'precio_unitario' => 'decimal:2',
            'total' => 'decimal:2',
        ];
    }

    public function producto(): BelongsTo
    {
        return $this->belongsTo(Productos::class);
    }

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Clientes::class);
    }
}
