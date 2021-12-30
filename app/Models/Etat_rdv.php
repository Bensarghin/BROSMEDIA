<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etat_rdv extends Model
{
    use HasFactory;

    public function rdv()
    {
        return $this->hasOne('App\Models\Rdv','rdv_id');
    }
}
