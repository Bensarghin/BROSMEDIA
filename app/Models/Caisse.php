<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caisse extends Model
{
    use HasFactory;

    protected $table='caisses';
    protected $casts = [
        'date_fact' => 'date:d M Y'
    ];
    protected $fillable = ['date_fact','revenue','depence','ttc','source','description'];
}
