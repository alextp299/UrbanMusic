<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria_Canciones extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'image',
    ];

    protected $table = 'categoria_canciones';

}
