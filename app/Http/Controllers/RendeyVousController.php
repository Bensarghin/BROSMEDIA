<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Rdv;
use App\Models\Etat_rdv;
use App\Models\Patient;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RendeyVousController extends Controller
{   
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {        
        $pat_id = array_map(function($item) {
            return (array)$item; 
        }, DB::table('rdvs')
        ->select('pat_id')
        ->get()->toArray());

        $rdvs = Patient::whereNotIn('id',$pat_id)
        ->orderByDesc('id');
        $patients = $rdvs->paginate(6);
            return view('admin_pages.rendey-vous.manage',[
                'data'=>$patients]);
    }

    public function filtrer()
    {
        $pat_id = array_map(function($item) {
            return (array)$item; 
        }, DB::table('rdvs')
        ->select('pat_id')
        ->get()->toArray());

        $rdvs = Patient::whereIn('id',$pat_id)
        ->orderByDesc('id');
        $patients = $rdvs->paginate(6);
            return view('admin_pages.rendey-vous.manage',[
                'data'=>$patients]);

    }

    public function update(Request $request, $id)
    {
        if($request->isMethod('GET')){

            $data = DB::table('rdvs')
            ->join('patients', 'patients.id', '=', 'rdvs.pat_id')
            ->join('etat_rdvs', 'rdvs.id', '=', 'etat_rdvs.rdv_id')
            ->join('actes', 'actes.id', '=', 'rdvs.act_id')
            ->select('rdvs.*', 'rdvs.id as rdv_id','patients.id', 'patients.nom as nom', 'patients.prenom as prenom',
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

            return redirect()->route('rdv.filter',1);

          
        }
    }
    
    public function insert($id)
    {
            $actes = DB::table('actes')->get();
            $medecins = DB::table('medecins')->get();
            $patients = DB::table('patients')
            ->where('id',$id)
            ->first();
            return view('admin_pages.rendey-vous.ajouter')->with([
                'actes'=>$actes,
                'medecins'=>$medecins,
                'patients'=>$patients
            ]);
    }
    public function ajouter(Request $request)
    {
            //insert into rdv
            $date_prend_rdv=$request->date_prend_rdv;
            $acte_id=$request->acte_id;
            $pat_id=$request->pat_id;
            $med_id=$request->med_id;

            $rdv_id = DB::table('rdvs')
            ->insertGetId( [
                'date_prend_rdv' => $date_prend_rdv,
                'act_id' => $acte_id,
                'pat_id' => $pat_id,
                'med_id' => $med_id
            ]);

            // insert into etat_rdv
            $date_consu=$request->date_consu;
            $status=$request->status;
            $heure_rdv=$request->heure_rdv;

            DB::table('etat_rdvs')
            ->insert([
                'date_consu'=>$date_consu,
                'status'=>$status,
                'heure_rdv'=>$heure_rdv,
                'rdv_id'=> $rdv_id

            ]);

            return redirect()->route('rdv.filter',1);
    }
    public function delete($id){
        DB::table('rdvs')
        ->where('id',$id)
        ->delete();

        return redirect()->route('rdv.filter',1);
    }
    public function search(Request $request)
    {
        $rdvs = DB::table('rdvs')
        ->join('patients', 'patients.id', '=', 'rdvs.pat_id')
        ->join('etat_rdvs', 'rdvs.id', '=', 'etat_rdvs.rdv_id')
        ->join('actes', 'actes.id', '=', 'rdvs.act_id')
        ->select('rdvs.*', 'patients.nom', 'patients.prenom','actes.nom_acte','etat_rdvs.*')
        ->where(DB::raw("CONCAT(nom,' ',prenom)"),'LIKE',$request->nomPrenom)
        ->paginate(3);
        
        if (!empty($rdvs)) {
            return view('admin_pages.rendey-vous.manage',[
                'data'=>$rdvs]);
        } 
        else {
            $nomPrenom = '%';
            isset($request->nomPrenom)? $nomPrenom= $request->nomPrenom : $nomPrenom='%';
            $data = DB::table('patients')
            ->where(DB::raw("CONCAT(nom,' ',prenom)"), 'LIKE', '%'.$nomPrenom.'%')
            ->get();
            return view('admin_pages.rendey-vous.manage')->with(['data'=>$data]);
        }
    }
}
