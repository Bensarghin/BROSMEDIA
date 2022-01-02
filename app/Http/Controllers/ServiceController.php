<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
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
    public function index()
    {
        return view('admin_pages.service.manage');
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
        $image = $request->file('logo');
        $filenameWithExt = $image->getClientOriginalName();
        //Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get just ext
        $extension = $image->getClientOriginalExtension();
        // Filename to store
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        // Upload Image
        $image->move(public_path('service'), $fileNameToStore);
        $nom_service = $request->nom_service;
        $description = $request->description;

         DB::table('services')->insert([
            'nom_service' => $nom_service,
            'image' => $fileNameToStore,
            'description' => $description
        ]);
        return redirect()->route('service');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data=DB::table('services')
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
        
        $fileNameToStore = Service::find($request->id)->image;
        if($request->file('logo')!=null){
            File::delete(public_path('service/'.$fileNameToStore));
            $image = $request->file('logo');
            $filenameWithExt = $image->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $image->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $image->move(public_path('service'), $fileNameToStore);
        }
        DB::table('services')
              ->where('id', $request->id)
              ->update(['nom_service' => $request->nom_service,
                        'image' => $fileNameToStore,
                        'description' => $request->description]);
        return redirect()->route('service');
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
        $fileNameToStore = Service::find($id);
        File::delete(public_path('service/'.$fileNameToStore->image));
        $qr=DB::table('services')->where('id', '=', $id)->delete();
        $data=Service::orderBy('id', 'desc')
        ->get();
        if($qr){
            return response()->json($data);
        }
    }
}
