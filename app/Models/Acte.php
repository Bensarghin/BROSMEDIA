<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acte extends Model
{
    use HasFactory;

    protected $table = 'actes';

    protected $fillable = [
        'nom_acte',
        'description'
    ];


    public function rdv()
    {
        return $this->belongsToMany('App\Models\Rdv','act_id');
    }
}
