<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable=['cin','nom','prenom','date_nais','sexe','tele','adresse'] ;

    public function facturation(){
        
        return $this->hasMany('App\Models\Facturation','pat_id');
    }

    public function ordonnance()
    {
        return $this->hasMany('App\Models\Ordonnance','pat_id');
    }
    
    public function rdv()
    {
        return $this->hasMany(Rdv::class, 'pat_id');
    }
}
