<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Rdv;
use App\Models\Consultation;
use App\Models;

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
        $patients = Rdv::find($id);

        return view('admin_pages.consultation.ajouter',[
            'data'      =>    $patients
        ]);
    }

    public function insert(Request $request, $id)
    {

        $pat_id = $request->pat_id;
        DB::table('consultations')
       ->insert([
            'motif' => $request->motif,
            'duree' => $request->duree,
            'detail'=> $request->detail,
            'rdv_id'=> $id
       ]);

       return redirect()->route('patient.detail', [ 'id' =>  $pat_id]);
    }

    public function modifier($id)
    {
        $data = Consultation::find($id);
        return view('admin_pages.consultation.modifier',[
            'data' => $data,
            'id' => $id
        ]);
    }

    public function update(Request $request, $id)
    {
        $pat_id = $request->pat_id;
        DB::table('consultations')
        ->where('id',$id)
        ->update([
            'motif' => $request->motif,
            'duree' => $request->duree,
            'detail' => $request->detail,
        ]);

        return redirect()->route('patient.detail',['id' => $pat_id]);
    }

    public function delete($id){
        
        DB::table('consultations')
        ->where('id',$id)
        ->delete();

        return redirect()->back();
    }
}
