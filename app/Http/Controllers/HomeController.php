<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Facturation;
use App\Models\Rdv;
use App\Models\Etat_rdv;
use App\Models\Consultation;

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
        $data = Consultation::all();
        $total_trait= DB::table('traitements')
        ->whereDate('created_at', date('Y-m-d'))
        ->count();
        $total_pat = DB::table('patients')
        ->whereDate('created_at', date('Y-m-d'))
        ->count();
        $rdvs = Etat_rdv::whereDate('date_consu', date('Y-m-d'));
        $fact = Facturation::whereDate('created_at', date('Y-m-d'));
        $total_fact = Facturation::all();
        return view('home',['data'=>$data,
                            'total_trait'   =>  $total_trait,
                            'rdvs'  =>  $rdvs,
                            'total_pat' =>  $total_pat,
                            'fact'  =>  $fact,
                            'total_fact' => $total_fact
                        ]);
    }

    public function getdata()
    {
        $data= DB::table('rdvs')
        ->join('patients','rdvs.pat_id','=','patients.id')
        ->join('etat_rdvs','etat_rdvs.rdv_id','=','rdvs.id')
        ->join('actes','actes.id','=','rdvs.act_id')
        ->select('rdvs.*','patients.*','etat_rdvs.*','etat_rdvs.id as etat_rdvs_id','actes.*')
        ->where('etat_rdvs.date_consu','=',today())
        ->where('status','LIKE','Encore')
        ->get();
        return response()->json($data);
    }

    public function filtrer(Request $request)
    {
        $nomPrenom='%';
        $status='%';
        $date_con=today();
        if(isset($request->nomPrenom)){
            $nomPrenom=$request->nomPrenom;
        }
        if(isset($request->status)){
            $status=$request->status;
        }
        if(isset($request->date_cons)){
            $date_con=$request->date_cons;
        }
        $data= DB::table('rdvs')
                ->join('patients','rdvs.pat_id','=','patients.id')
                ->join('etat_rdvs','etat_rdvs.rdv_id','=','rdvs.id')
                ->join('actes','actes.id','=','rdvs.act_id')
                ->select('patients.*','etat_rdvs.*','etat_rdvs.id as etat_rdvs_id','actes.*')
                ->where('etat_rdvs.status','LIKE',$status)
                ->where(DB::raw("CONCAT(nom,' ',prenom)"), 'LIKE', '%'.$nomPrenom.'%')
                ->where('etat_rdvs.date_consu','=',$date_con)
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
