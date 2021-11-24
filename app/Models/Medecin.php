<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medecin extends Model
{
    use HasFactory;

    public function ordonnance()
    {
        return $this->hasMany('App\Models\Ordonnance','med_id');
    }
}
