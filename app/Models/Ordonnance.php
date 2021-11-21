<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordonnance extends Model
{
    use HasFactory;

    protected $fillable =['pat_id','med_id'];

    public function medicament()
    {
        return $this->belongsToMany('App\Models\Medicament','medords', 'ord_id','medic_id');
    }
    public function patient()
    {
        return $this->belongsTo('App\Models\Patient','pat_id');
    }

}
