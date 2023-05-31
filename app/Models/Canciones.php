<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Canciones extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'audio',
        'image',
        'id_categoria_cancion',
    ];
    
    protected $table = 'canciones';

}
