<?php

namespace App\Http\Controllers\visiteur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cabinet;
use App\Models\Patient;
use App\Models\Acte;
use Illuminate\Support\Facades\DB;

class rdvController extends Controller
{
    public function index()
    {
        $cabenit = Cabinet::first();
        $actes = Acte::all();
        return view('visiteur_pages.pages.rdv',[
            'cabinet' => $cabenit,
            'actes'   => $actes
        ]);
    }

    public function insert(Request $request){

        $request->validate([
            'cin'       => 'required|unique:patients,cin',
            'nom'       => 'required',
            'prenom'    => 'required',
            'sexe'      => 'required',
            'date_nais' => 'required',
            'tele'      => 'required',
            'adresse'   => 'required',
            'acte'      => 'required'
        ]);
        $pat_id = DB::table('patients')
        ->insertGetId([
            'cin'       => $request->cin,
            'nom'       => $request->nom,
            'prenom'    => $request->prenom,
            'sexe'      => $request->sexe,
            'date_nais' => $request->date_nais,
            'tele'      => $request->tele,
            'adresse'   => $request->adresse,
        ]);

        if($pat_id){
            DB::table('rdvs')
            ->insert([
                'pat_id'    => $pat_id,
                'act_id'    => $request->acte
            ]);
            return redirect()->back()->with('message',
            'Votre compte a été enregistré et vous recevrez 
            votre rendez-vous sur votre compte whatsapp');
        }
    }

    public function update(Request $request, $id){
        Patient::create($request->all());
    }
}
