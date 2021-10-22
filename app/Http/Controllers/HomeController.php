<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = DB::table('rdvs')
        ->join('patients','rdvs.pat_id','=','patients.id')
        ->join('etat_rdvs','etat_rdvs.rdv_id','=','rdvs.id')
        ->join('consultations','consultations.erdv_id','=','etat_rdvs.id')
        ->get();
        $total_trait= DB::table('traitements')->count();
        $total_pat = DB::table('patients')->count();
        $total_rdv = DB::table('rdvs')->count();
        return view('home',['data'=>$data,
                            'total_trait'=>$total_trait,
                            'total_rdv'=>$total_rdv,
                            'total_pat'=>$total_pat]);
    }

    public function getdata()
    {
        $data= DB::table('rdvs')
        ->join('patients','rdvs.pat_id','=','patients.id')
        ->join('etat_rdvs','etat_rdvs.rdv_id','=','rdvs.id')
        ->join('consultations','consultations.erdv_id','=','etat_rdvs.id')
        ->select('patients.*','etat_rdvs.*','etat_rdvs.id as etat_rdvs_id','consultations.*')
        ->get();
        return response()->json($data);
    }

    public function filtrer(Request $request)
    {
        $nomPrenom='%';
        $status='%';
        if(isset($request->nomPrenom)){
            $nomPrenom=$request->nomPrenom;
        }
        if(isset($request->status)){
            $status=$request->status;
        }
        $data= DB::table('rdvs')
                ->join('patients','rdvs.pat_id','=','patients.id')
                ->join('etat_rdvs','etat_rdvs.rdv_id','=','rdvs.id')
                ->join('consultations','consultations.erdv_id','=','etat_rdvs.id')
                ->select('patients.*','etat_rdvs.*','consultations.*')
                ->where('etat_rdvs.status','LIKE',$status)
                ->where(DB::raw("CONCAT(nom,' ',prenom)"), 'LIKE', '%'.$nomPrenom.'%')
                ->get();
        return response()->json($data);
        
    }
    public function updateStatus(Request $request)
    {
       $status=$request->status;
       $etat_id=$request->etat_id;
       DB::table('etat_rdvs')
       ->where('id',$etat_id)
       ->update([
           'status'=> $status
       ]);
    }

}
