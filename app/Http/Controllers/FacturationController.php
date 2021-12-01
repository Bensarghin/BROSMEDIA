<?php

namespace App\Http\Controllers;

use App\Models\Facturation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class FacturationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data = DB::table('patients')->where('id',$id)->first();
        return view('admin_pages.facturation.ajouter',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $getDate = Date('Y-m-d');
        DB::table('facturations')
        ->insert([
            'pat_id' => $request->pat_id,
            'montant' => $request->montant,
            'avance' => $request->avance,
            'motif' => $request->motif,
            'date_pay' => $getDate

        ]);

        return redirect()->route('patient.detail',['id'=>$request->pat_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Facturation  $facturation
     * @return \Illuminate\Http\Response
     */
    public function show(Facturation $facturation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Facturation  $facturation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $facts = Facturation::find($id);
        return view('admin_pages.facturation.modifier',['data'=>$facts]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Facturation  $facturation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('facturations')
        ->where('id',$id)
        ->update([
            'montant' => $request->montant,
            'avance' => $request->avance,
            'motif' => $request->motif

        ]);

        return redirect()->route('patient.detail',['id'=>$request->pat_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Facturation  $facturation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('facturations')
        ->where('id',$id)
        ->delete();
        return redirect()->back();
    }
}
