<?php

namespace App\Http\Controllers;

use App\Models\Ordonnance;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Patient;
use App\Models\Medecin;

class OrdonnanceController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $medic = DB::table('medicaments')->get();
        $patients = Patient::find($id);
        $medecins = Medecin::all();
        return view('admin_pages.ordonnance.manage',[
            'medic' => $medic,
            'patients' => $patients,
            'medecins' => $medecins
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $patients = Patient::find($id);

        return view('admin_pages.ordonnance.index',['patients' => $patients]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'pat_id' => 'required',
            'medecin' => 'required',
            'medicaments' => 'required'

        ]);
        $ord=Ordonnance::create([
            'pat_id' => $request->pat_id,
            'med_id' => $request->medecin
        ]);

        $ord->medicament()->attach($request->medicaments);
        return redirect()->route('ordonnance.show',['ordonnance'=>$ord]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ordonnance  $ordonnance
     * @return \Illuminate\Http\Response
     */
    public function show(Ordonnance $ordonnance)
    {
        $cabenit  = DB::table('cabinets')->first();
        return view('admin_pages.ordonnance.show',[
            'ord'     => $ordonnance,
            'cabinet' => $cabenit]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ordonnance  $ordonnance
     * @return \Illuminate\Http\Response
     */
    public function edit(Ordonnance $ordonnance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ordonnance  $ordonnance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ordonnance $ordonnance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ordonnance  $ordonnance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ordonnance $ordonnance)
    {
        $ordonnance->delete();
        return redirect()->back();
    }
}
