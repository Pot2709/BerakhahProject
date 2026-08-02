<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CLiente extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'id_cliente';
    protected $fillable = [
        'nombre_cliente',
        'correo_cliente',
        'empresa_cliente',
        'estado_cliente'
    ];
}


