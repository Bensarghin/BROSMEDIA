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
        $patients = DB::table('patients')->get();
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
}
