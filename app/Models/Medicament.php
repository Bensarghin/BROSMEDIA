<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicament extends Model
{
    use HasFactory;
        public function ordonnance()
        {
            return $this->belongsToMany('Add/Models/Ordonnance','medords', 'medic_id','ord_id');
        }
    
}
