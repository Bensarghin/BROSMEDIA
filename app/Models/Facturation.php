<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facturation extends Model
{
    use HasFactory;

    public function patient(){
        return $this->belongsTo( 'App\Models\Patient','pat_id');
    }
}
