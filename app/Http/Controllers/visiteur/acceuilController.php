<?php

namespace App\Http\Controllers\visiteur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cabinet;
use App\Models\User;
use App\Models\Service;

class acceuilController extends Controller
{
    public function __construct()
    {
        $cabinet = Cabinet::first();
        $services = Service::paginate(6);
        \view()->share([
            'cabinet'    => $cabinet,
            'services'   => $services
        ]);
    }
    public function index()
    {
        return view('visiteur_pages.pages.home');
    }

    public function contact(){
        return view('visiteur_pages.pages.contact');
    }
}
