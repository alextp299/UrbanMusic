<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [

        'precio',
        'id_usuario',
        'fecha',

    ];

    function producto() {

        return $this->belongsToMany(Producto::class,'pedido_productos','id_pedido','id_producto');

    }
    
}
