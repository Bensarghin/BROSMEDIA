<?php

namespace App\Http\Controllers\visiteur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cabinet;
use App\Models\Acte;

class acceuilController extends Controller
{
    public function index()
    {
        $cabinet = Cabinet::first();
        $actes = Acte::limit(6)->get();
        return view('visiteur_pages.pages.home',[
            'cabinet' => $cabinet,
            'actes'   => $actes
        ]);
    }
}
