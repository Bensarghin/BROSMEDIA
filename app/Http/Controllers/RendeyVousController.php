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
        ->select('rdvs.*', 'patients.nom', 'patients.prenom','actes.nom_acte','etat_rdvs.date_consu')
        ->get();
        return view('admin_pages.rendey-vous.manage',['data'=>$rdvs]);
    }

    public function update(Request $request, $id)
    {
        if($request->isMethod('GET')){
            $data = DB::table('rdvs')
            ->join('patients', 'patients.id', '=', 'rdvs.pat_id')
            ->join('etat_rdvs', 'rdvs.id', '=', 'etat_rdvs.rdv_id')
            ->join('actes', 'actes.id', '=', 'rdvs.act_id')
            ->select('rdvs.*', 'rdvs.id as rdv_id','patients.id', 'patients.nom', 'patients.prenom',
                    'actes.id','actes.nom_acte','etat_rdvs.*','etat_rdvs.id as etat_id')
            ->where('rdvs.id','=',$id)
            ->first();
            $actes = DB::table('actes')->get();
            $medecins = DB::table('medecins')->get();
            return view('admin_pages.rendey-vous.modifier')
            ->with([
                'data'=>$data,
                'actes'=>$actes,
                'medecins'=>$medecins]);
        }
        else{
            //update rdv
            $date_prend_rdv=$request->date_prend_rdv;
            $acte_id=$request->acte_id;

            DB::table('rdvs')
            ->where('id',$id)
            ->update(
                ['date_prend_rdv' => $date_prend_rdv,
                'act_id' => $acte_id]
            );

            // update etat_rdv
            $etat_id=$request->etat_id;
            $date_consu=$request->date_consu;
            $status=$request->status;
            $heure_rdv=$request->heure_rdv;
            $med_id=$request->med_id;

            DB::table('etat_rdvs')
            ->where('id','=',$etat_id)
            ->update([
                'date_consu'=>$date_consu,
                'status'=>$status,
                'heure_rdv'=>$heure_rdv,
                'med_id'=>$med_id

            ]);

            return redirect()->route('rdv.manage');

          
        }
    }
    
    public function insert(Request $request)
    {
        if($request->isMethod('GET')){
            $actes = DB::table('actes')->get();
            $medecins = DB::table('medecins')->get();
            return view('admin_pages.rendey-vous.ajouter')->with([
                'actes'=>$actes,
                'medecins'=>$medecins
            ]);
        }
    }
}
