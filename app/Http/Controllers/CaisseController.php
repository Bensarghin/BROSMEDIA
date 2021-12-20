<?php

namespace App\Http\Controllers;

use App\Models\Caisse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CaisseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $caisse = DB::table('caisses')->select(
            DB::raw("
                MONTH(date_fact) month,
                SUM(CASE WHEN type='depense' THEN taux END) taux_depense, 
                SUM(CASE WHEN type='revenue' THEN taux END) taux_revenue")
            )
            ->groupBy(DB::raw('MONTH(date_fact)'))
            ->whereYear('date_fact',  date('Y'))
            ->get();
        return response()->json($caisse);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $years = Caisse::
        groupBy(DB::raw('YEAR(date_fact)'))
        ->select(DB::raw('YEAR(date_fact) year'))
        ->get();

        return response()->json($years);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Caisse::create($request->all());
        return response()->json(Caisse::all());

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Caisse  $caisse
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $caisse = Caisse::whereMonth('date_fact',$request->month)
        ->whereYear('date_fact',$request->year)
        ->get();
        return response()->json($caisse);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Caisse  $caisse
     * @return \Illuminate\Http\Response
     */
    public function filtrer(Request $request)
    {
        $caisse = Caisse::whereYear('date_fact', $request->year)
        ->groupBy(DB::raw('MONTH(date_fact)'))
        ->select(
            (DB::raw('MONTH(date_fact) month')),
            (DB::raw('SUM(revenue) revenue')),
            (DB::raw('SUM(depence) depence')),
            (DB::raw('SUM(TTC) TTC'))
            )
        
        ->get();
        return response()->json($caisse);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Caisse  $caisse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Caisse $caisse)
    {
        Caisse::create([]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Caisse  $caisse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Caisse $caisse)
    {
        //
    }
}
