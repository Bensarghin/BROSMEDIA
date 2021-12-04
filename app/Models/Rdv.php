<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rdv extends Model
{
    use HasFactory;

    protected $table = 'rdvs';

    protected $fillable = [
        'date_prend_rdv',
        'pat_id',
        'act_id'
    ];

    public function etat_rdv()
    {
        return $this->hasOne('App\Models\Etat_rdv');
    }

    public function patient()
    {
        return $this->belongsTo('App\Models\Patient','pat_id');
    }

    public function consultation()
    {
        return $this->hasOne('App\Models\Consultation');
    }

    public function acte()
    {
        return $this->belongsTo('App\Models\Acte','act_id');
    }
}
