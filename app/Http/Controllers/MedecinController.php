<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medecin;
use Illuminate\Support\Facades\DB;

class MedecinController extends Controller
{
    public function index()
    {
        $data = Medecin::orderBy('id','DESC')->get();
        return view('admin_pages.medecin.manage',[
            'data' => $data
        ]);
    }

    public function create()
    {
        $data = Medecin::all();
        return view('admin_pages.medecin.manage',[
            'data' => $data
        ]);
    }

    public function store(Request $request)
    {
        DB::table('medecins')
        ->insert([
            'cin' => $request->cin,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'sexe' => $request->sexe,
            'date_nais' => $request->date_nais,
            'tele' => $request->tele,
            'adresse' => $request->adresse,
            'special' => $request->special,
        ]);

        
        return redirect()->route('medecin');
    }

    public function edit($id)
    {
        $data = Medecin::find($id);
        return view('admin_pages.medecin.edit',[
            'data' => $data
        ]);

    }

    public function update(Request $request,$id)
    {
        DB::table('medecins')
        ->where('id',$id)
        ->update([
            'cin' => $request->cin,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'sexe' => $request->sexe,
            'date_nais' => $request->date_nais,
            'tele' => $request->tele,
            'adresse' => $request->adresse,
            'special' => $request->special,
        ]);

        
        return redirect()->route('medecin');
    }

    public function delete(Medecin $medecin)
    {
        $medecin->delete();
        return redirect()->back();
    }
}
