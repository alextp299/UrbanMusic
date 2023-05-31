<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'precio',
        'image',
        'id_categoria',
    ];

    protected $table = 'productos';

    function pedido() {

        return $this->belongsToMany(Pedido::class,'pedido_productos');

    }

    

}
