<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Patient;
class patientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $patients = DB::table('patients')
        ->orderBy('id','DESC')
        ->paginate(6);
        return view('admin_pages.patient.manage',['data'=>$patients]);
    }
    public function insert(Request $request)
    {
        if($request->isMethod('POST')){
            
            DB::table('patients')->insertOrIgnore(
                ['cin' => $request->cin,
                'nom' => $request->input('nom'),
                'prenom' => $request->input('prenom'),
                'sexe' => $request->input('sexe'),
                'date_nais' => $request->input('date_nais'),
                'tele' => $request->input('tele'),
                'adresse' => $request->input('adresse')]
            );

            return redirect()->route('patient.manage');
        }
    }

    public function detail($id)
    {
        $patients = DB::table('patients')
        ->where('id',$id)
        ->first();
        $consu = DB::table('rdvs')
        ->join('patients','patients.id','=','rdvs.pat_id')
        ->join('etat_rdvs','etat_rdvs.rdv_id','=','rdvs.id')
        ->join('consultations','consultations.erdv_id','=','etat_rdvs.id')
<<<<<<< HEAD
        ->select('patients.*','rdvs.*','etat_rdvs.*','consultations.*','consultations.id as consu_id')
=======
        ->select('patients.*','rdvs.*','etat_rdvs.*','consultations.*','consultations.id as cons_id')
>>>>>>> c600510afe539969ce921302ff32d488d656dcb0
        ->where('patients.id', $id)
        ->get();
        $traitements = DB::table('rdvs')
        ->join('patients','patients.id','=','rdvs.pat_id')
        ->join('etat_rdvs','etat_rdvs.rdv_id','=','rdvs.id')
        ->join('traitements','traitements.erdv_id','=','etat_rdvs.id')
        ->select('patients.*','rdvs.*','etat_rdvs.*','traitements.*','traitements.id as trai_id')
        ->where('patients.id', $id)
        ->get();
        $rdvs = DB::table('rdvs')
        ->join('patients','patients.id','=','rdvs.pat_id')
        ->join('etat_rdvs','etat_rdvs.rdv_id','=','rdvs.id')
        ->select('patients.*','rdvs.*','etat_rdvs.id as etat_id','etat_rdvs.*')
        ->where('patients.id', $id)
        ->get();
        $facts = DB::table('facturations')
        ->join('patients','patients.id','=','facturations.pat_id')
        ->select('patients.*','facturations.*')
        ->where('patients.id', $id)
        ->get();

        return view('admin_pages.patient.details',[
            'patients'  => $patients,
            'consu' => $consu,
            'traitements'=> $traitements,
            'rdvs' => $rdvs,
            'facts' =>  $facts
        ]);
    }

    public function update(Request $request,$id)
    {
        
        if($request->isMethod('GET') && isset($id)){
        
            $data = DB::table('patients')
            ->where('id', '=', $id)
            ->first();
            return view('admin_pages.patient.modifier')->with([
                'success'=>'votre patient a été bien ajouter',
                'data'=>$data
            ]);
        }
        if($request->isMethod('POST')){

            $affected = DB::table('patients')
              ->where('id', $id)
              ->update(['cin' => $request->input('cin'),
                        'nom' => $request->input('nom'),
                        'prenom' => $request->input('prenom'),
                        'sexe' => $request->input('sexe'),
                        'date_nais' => $request->input('date_nais'),
                        'tele' => $request->input('tele'),
                        'adresse' => $request->input('adresse')]);
            return redirect()->route('patient.manage');
              
        }
    }

    public function search(Request $request)
    {
        $nomPrenom = $request->input('nomPrenom');
        isset($nomPrenom)? $nomPrenom=$nomPrenom : $nomPrenom='%';
        $data = DB::table('patients')
        ->where(DB::raw("CONCAT(nom,' ',prenom)"), 'LIKE', '%'.$nomPrenom.'%')
        ->orderBy('id', 'desc')
        ->paginate(2);
        return view('admin_pages.patient.manage')->with(['data'=>$data]);
    }

    public function delete($id)
    {
        DB::table('patients')->where('id', '=', $id)->delete();
        return redirect()->route('patient.manage');
    }
}
