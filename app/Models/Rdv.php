<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rdv extends Model
{
    use HasFactory;

    public function etat_rdv()
    {
        return $this->hasOne('App\Models\Etat_rdv','rdv_id');
    }

    public function patient()
    {
        return $this->belongsTo('App\Models\Patient','pat_id');
    }

    public function consultation()
    {
        return $this->hasOne('App\Models\Consultation','rdv_id');
    }
}
