<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RendeyVousController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $rdvs = DB::table('rdvs')
        ->join('patients', 'patients.id', '=', 'rdvs.pat_id')
        ->join('etat_rdvs', 'rdvs.id', '=', 'etat_rdvs.rdv_id')
        ->join('actes', 'actes.id', '=', 'rdvs.act_id')
        ->select('rdvs.*', 'patients.nom', 'patients.prenom','actes.nom_acte')
        ->get();
        return view('admin_pages.rendey-vous.manage',['data'=>$rdvs]);
    }
}
