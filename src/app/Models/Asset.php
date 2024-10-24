<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    // Agrega los campos que pueden ser llenados por asignación masiva
    protected $fillable = [
        'nombre',
        'codigo_inventario',
        'codigo_patrimonio',
        'detalle',
        'imagen',
        'tipo',
        'cantidad',
        'alta',
        'observaciones',
    ];

    protected $casts = [
        'alta' => 'date',
        'baja' => 'date',
    ];
}