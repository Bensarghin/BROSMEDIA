<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $table = 'consultations';
    protected $fillable = [
        'duree',
        'motif',
        'detail',
        'rdv_id'
    ];


    public function rdv()
    {
        return $this->belongsTo('App\Models\Rdv');
    }

}
