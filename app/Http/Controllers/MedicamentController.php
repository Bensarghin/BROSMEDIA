<?php

namespace App\Http\Controllers;

use App\Models\Medicament;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedicamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin_pages.medicament.manage');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nomMedic = $request->nomMedic;
        $utilisation = $request->utilisation;

         DB::table('medicaments')->insert([
            'nom_medicament'=> $nomMedic,
            'notice_utilisation'=>$utilisation
        ]);
        $medicaments = DB::table('medicaments')
        ->orderBy('id', 'desc')
        ->get();
        return response()->json($medicaments);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medicament  $medicament
     * @return \Illuminate\Http\Response
     */
    public function show(Medicament $medicament)
    {
        $data=DB::table('medicaments')
        ->orderBy('id', 'desc')
        ->get();
        return response()->json($data);
    }

    public function search(Request $request)
    {
        isset($request->nomMedic)? $nomMedic=$request->nomMedic : $nomMedic='%';
        $data=DB::table('medicaments')
        ->where('nom_medicament','LIKE','%'.$nomMedic.'%')
        ->orderBy('id', 'desc')
        ->get();
        return response()->json($data);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medicament  $medicament
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicament $medicament)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medicament  $medicament
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicament $medicament)
    {
        $affected = DB::table('medicaments')
              ->where('id', $request->id)
              ->update(['nom_medicament' => $request->nomMedic,
                        'notice_utilisation' => $request->utilisation]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medicament  $medicament
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request)
    {
        $id=$request->id;
        $qr=DB::table('medicaments')->where('id', '=', $id)->delete();
        $data=DB::table('medicaments')
        ->orderBy('id', 'desc')
        ->get();
        if($qr){
            
        return response()->json($data);
        }
    }
}
