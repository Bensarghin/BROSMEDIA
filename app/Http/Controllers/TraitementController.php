<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Rdv;
use App\Models\Traitement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TraitementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ajouter($id)
    {
        $patients = Rdv::find($id);

        return view('admin_pages.traitement.ajouter', [
            'data'     =>    $patients
        ]);
    }

    public function insert(Request $request, $id)
    {
       $trait_id = DB::table('traitements')
       ->insertGetId([
        'nomTrait' => $request->nomTrait,
        'typeTrait' => $request->typeTrait,
        'description' => $request->description,
        'status' => $request->status,
        'rdv_id' => $id,
    ]);
    $pat_id = Traitement::find($trait_id)->rdv->patient;
       return redirect()->route('patient.detail',['id' => $pat_id]);
    }

    public function modifier($id)
    {
        $data = DB::table('rdvs')
        ->join('patients','patients.id','=','rdvs.pat_id')
        ->join('traitements','traitements.rdv_id','=','rdvs.id')
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

        $pat_id = Traitement::find($id)->rdv->patient;

        return redirect()->route('patient.detail',['id' => $pat_id]);
    }

    public function delete($id){
      
        DB::table('traitements')
        ->where('id',$id)
        ->delete();

        return redirect()->back();
    }
}
