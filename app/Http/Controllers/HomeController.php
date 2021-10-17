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
        return view('home');
    }

    public function getdata()
    {
        $data= DB::table('patients')->get();
        return response()->json($data);
    }

    public function filtrer(Request $request)
    {
        $nomPrenom='%';
        $sexe='%';
        if(isset($request->nomPrenom)){
            $nomPrenom=$request->nomPrenom;
        }
        if(isset($request->sexe)){
            $sexe=$request->sexe;
        }
        $data = DB::table('patients')
                ->where('sexe', 'LIKE', $sexe)
                ->where(DB::raw("CONCAT(nom,' ',prenom)"), 'LIKE', '%'.$nomPrenom.'%')
                ->get();
        return response()->json($data);
        
    }

}
