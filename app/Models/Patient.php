<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable=['cin','nom','prenom','date_nais','sexe','tele','adresse'] ;

    

    public function ordonnance()
    {
        return $this->hasOne('App\Models\Ordonnance','pat_id');
    }

}
