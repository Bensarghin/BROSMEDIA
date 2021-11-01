<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultationController extends Controller
{
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

<<<<<<< HEAD
    public function modifier($id){

=======
    public function modifier($id)
    {
>>>>>>> c600510afe539969ce921302ff32d488d656dcb0
        $data = DB::table('rdvs')
        ->join('patients','patients.id','=','rdvs.pat_id')
        ->join('etat_rdvs','etat_rdvs.rdv_id','=','rdvs.id')
        ->join('consultations','consultations.erdv_id','=','etat_rdvs.id')
<<<<<<< HEAD
        ->select('patients.*','rdvs.*','etat_rdvs.*','consultations.*','consultations.id as consu_id')
        ->where('consultations.id', $id)
        ->first();

        return view('admin_pages.consultation.modifier',[
            'data'=>$data
        ]);
    }

    public function update(Request $request,$id){

=======
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
>>>>>>> c600510afe539969ce921302ff32d488d656dcb0
        DB::table('consultations')
        ->where('id',$id)
        ->update([
            'motif' => $request->motif,
            'duree' => $request->duree,
<<<<<<< HEAD
            'detail' => $request->detail
        ]);
=======
            'detail' => $request->detail,
        ]);

        return redirect()->back();
    }

    public function delete($id){
      
        DB::table('consultations')
        ->where('id',$id)
        ->delete();

>>>>>>> c600510afe539969ce921302ff32d488d656dcb0
        return redirect()->back();
    }
}
