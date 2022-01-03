<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Patient;
use App\Models\Rdv;
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

    public function detail($id)
    {

        $patient  = Patient::find($id);
        $data= DB::table('rdvs')
        ->join('patients','rdvs.pat_id','=','patients.id')
        ->join('consultations','consultations.rdv_id','=','rdvs.id')
        ->select('rdvs.*','patients.*','consultations.*')
        ->where('patients.id',$id)
        ->get();

        $traitements= DB::table('rdvs')
        ->join('patients','rdvs.pat_id','=','patients.id')
        ->join('traitements','traitements.rdv_id','=','rdvs.id')
        ->select('rdvs.*','patients.*','traitements.*')
        ->where('patients.id',$id)
        ->get();

        return view('admin_pages.patient.details',[
            'patient' => $patient,
            'data'   => $data,
            'traitements'    => $traitements
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
