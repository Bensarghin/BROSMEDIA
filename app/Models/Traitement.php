<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traitement extends Model
{
    use HasFactory;

    public function rdv()
    {
        return $this->belongsTo('App\Models\Rdv');
    }
}