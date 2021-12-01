<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        // avec consulatation
        $patients = DB::table('rdvs')
        ->join('patients','rdvs.pat_id','=','patients.id')
        ->join('etat_rdvs','etat_rdvs.rdv_id','=','rdvs.id')
        ->join('consultations','consultations.erdv_id','=','etat_rdvs.id')
        ->select('patients.*','rdvs.*','etat_rdvs.*','consultations.*')
        ->get();
            return view('admin_pages.traitement.manage',[
                'data'=>$patients
            ]);
    }

    public function show(){

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

    public function ajouter($id)
    {
        $patients = DB::table('rdvs')
        ->join('patients','rdvs.pat_id','=','patients.id')
        ->join('etat_rdvs','etat_rdvs.rdv_id','=','rdvs.id')
        ->select('patients.*','rdvs.*','etat_rdvs.*')
        ->where('etat_rdvs.id',$id)
        ->first();

        return view('admin_pages.consultation.ajouter',[
            'data'      =>    $patients,
            'etat_id'   =>    $id
        ]);
    }

    public function insert(Request $request,$id)
    {
       DB::table('consultations')
       ->insert([
            'motif' => $request->motif,
            'duree' => $request->duree,
            'detail'=> $request->detail,
            'erdv_id'=>$id
       ]);

       return back();
    }

    public function modifier($id)
    {
        $data = DB::table('rdvs')
        ->join('patients','patients.id','=','rdvs.pat_id')
        ->join('etat_rdvs','etat_rdvs.rdv_id','=','rdvs.id')
        ->join('consultations','consultations.erdv_id','=','etat_rdvs.id')
        ->select('patients.*','patients.id as pat_id','consultations.*')
        ->where('consultations.id', $id)
        ->first();
        return view('admin_pages.consultation.modifier',[
            'data' => $data,
            'id' => $id
        ]);
    }

    public function update(Request $request, $id)
    {
        DB::table('consultations')
        ->where('id',$id)
        ->update([
            'motif' => $request->motif,
            'duree' => $request->duree,
            'detail' => $request->detail,
        ]);

        return redirect()->back();
    }

    public function delete($id){
      
        DB::table('consultations')
        ->where('id',$id)
        ->delete();

        return redirect()->back();
    }
}
