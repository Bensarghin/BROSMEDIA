<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin_pages.acte.manage');
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
        $nomActe = $request->nomActe;
        $prix = $request->prix;
        $description = $request->description;

         DB::table('actes')->insert([
            'nom_acte'=> $nomActe,
            'prix'=>$prix,
            'description'=>$description
        ]);
        $actes = DB::table('actes')
        ->orderBy('id', 'desc')
        ->get();
        return response()->json($actes);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data=DB::table('actes')
        ->orderBy('id', 'desc')
        ->get();
        return response()->json($data);
    }

    public function search(Request $request)
    {
        isset($request->nomActe)? $nomActe=$request->nomActe : $nomActe='%';
        $data=DB::table('actes')
        ->where('nom_acte','LIKE','%'.$nomActe.'%')
        ->orderBy('id', 'desc')
        ->get();
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $affected = DB::table('actes')
              ->where('id', $request->id)
              ->update(['nom_acte' => $request->nomActe,
                        'prix' => $request->prix,
                        'description' => $request->description]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id=$request->id;
        DB::table('actes')->where('id', '=', $id)->delete();
        $data=DB::table('actes')
        ->orderBy('id', 'desc')
        ->get();
        return response()->json($data);
    }
}
