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
                ['cin' => $request->input('cin'),
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
        ->paginate(10);
        return view('admin_pages.patient.manage')->with(['data'=>$data]);
    }

    public function delete($id)
    {
        DB::table('patients')->where('id', '=', $id)->delete();
        return redirect()->route('patient.manage');
    }
}
