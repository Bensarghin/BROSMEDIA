<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TraitementController extends Controller
{

    public function ajouter($id)
    {
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

    public function insert(Request $request,$id)
    {
       DB::table('traitements')
       ->insert([
        'nomTrait' => $request->nomTrait,
        'typeTrait' => $request->typeTrait,
        'description' => $request->description,
        'status' => $request->status,
        'erdv_id' => $id,
    ]);
;

       return back();
    }

    public function modifier($id)
    {
        $data = DB::table('rdvs')
        ->join('patients','patients.id','=','rdvs.pat_id')
        ->join('etat_rdvs','etat_rdvs.rdv_id','=','rdvs.id')
        ->join('traitements','traitements.erdv_id','=','etat_rdvs.id')
        ->select('patients.*','patients.id as pat_id','traitements.*')
        ->where('traitements.id', $id)
        ->first();
        return view('admin_pages.traitement.modifier',[
            'data' => $data,
            'id' => $id
        ]);
    }

    public function update(Request $request, $id)
    {
        DB::table('traitements')
        ->where('id',$id)
        ->update([
            'nomTrait' => $request->nomTrait,
            'typeTrait' => $request->typeTrait,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->back();
    }

    public function delete($id){
      
        DB::table('traitements')
        ->where('id',$id)
        ->delete();

        return redirect()->back();
    }
}
