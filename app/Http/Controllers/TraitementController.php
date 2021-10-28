<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TraitementController extends Controller
{
    public function index(){
        // sans consultation
        $arrayData = array_map(function($item) {
        return (array)$item; 
        }, DB::table('consultations')
        ->select('erdv_id')
        ->get()->toArray());

        $patients = DB::table('rdvs')
        ->join('patients','rdvs.pat_id','=','patients.id')
        ->join('etat_rdvs','etat_rdvs.rdv_id','=','rdvs.id')
        ->select('patients.*','rdvs.*','etat_rdvs.*')
        ->whereNotIn('etat_rdvs.id', $arrayData)
        // ->orderBy('id','DESC')
        // ->paginate(6);
        ->get();
            return view('admin_pages.traitement.manage',[
                'data'=>$patients
            ]);
    }

    public function Traitement(){

        $patients = DB::table('rdvs')
        ->join('patients','rdvs.pat_id','=','patients.id')
        ->join('etat_rdvs','etat_rdvs.rdv_id','=','rdvs.id')
        ->select('patients.*','rdvs.*','etat_rdvs.*')
        ->get();
            return view('admin_pages.traitement.manage',[
                'data'=>$patients
            ]);
    }

    public function ajouter(Request $request, $id){

        $patients = DB::table('rdvs')
        ->join('patients','rdvs.pat_id','=','patients.id')
        ->join('etat_rdvs','etat_rdvs.rdv_id','=','rdvs.id')
        ->select('patients.*','rdvs.*','etat_rdvs.*')
        ->where('etat_rdvs.id',$id)
        ->first();

        return view('admin_pages.traitement.ajouter',[
            'data'      =>    $patients,
            'etat_id'   =>    $id
        ]);
    }

    public function insert(Request $request, $id){

        DB::table('traitements')
        ->insert([
            'nomTrait' => $request-> nomTrait,
            'typeTrait' => $request-> type,
            'description' => $request-> description,
            'erdv_id' => $id,
            'status' => $request->status
        ]);

        return redirect()->route('patient.manage');
    }
}
