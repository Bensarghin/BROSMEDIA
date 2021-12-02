<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $table = 'consultations';

    public function rdv()
    {
        return $this->belongsTo('App\Models\Rdv','rdv_id');
    }

}
