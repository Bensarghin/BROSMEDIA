<?php

namespace App\Http\Controllers;

use App\Models\Cabinet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
        $cabenit = DB::table('cabinets')->first();
        return view('admin_pages.user.cabenit',[
            'cabinet'   => $cabenit
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cabenit = Cabinet::first();
        return view('admin_pages.User.modifier',[ 'cabinet' => $cabenit ]);
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
            'logo'=>'required|mimes:png,jpg,jpeg',
            'nom'=>'required',
            'description'=>'required',
            'tele'=>'required',
            'adresse'=>'required',
            'ville'=>'required',
            'service_titre'=>'required',
            'heure_ouver'=>'required',
            'heure_ferme'=>'required',
        ]);

        $filenameWithExt = $request->file('logo')->getClientOriginalName();
        //Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get just ext
        $extension = $request->file('logo')->getClientOriginalExtension();
        // Filename to store
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        // Upload Image
        $request->logo->move(public_path('cabenit'), $fileNameToStore);

        DB::table('cabinets')
        ->insert([
            'nom_cabenit' => $request->nom,
            'logo' => $fileNameToStore,
            'description' => $request->description,
            'tele' => $request->tele,
            'adresse' => $request->adresse,
            'ville' => $request->ville,
            'services_titre' => $request->service_titre,
            'heure_ouver' => $request->heure_ouver,
            'heure_ferme' => $request->heure_ferme,

        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function modifier(Request $request)
    { 
        // delete old file
        $cabenit = Cabinet::first();
        File::delete(public_path('cabenit/'.$cabenit->logo));

        $filenameWithExt = $request->file('logo')->getClientOriginalName();
        //Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get just ext
        $extension = $request->file('logo')->getClientOriginalExtension();
        // Filename to store
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        // Upload Image
        $request->logo->move(public_path('cabenit'), $fileNameToStore);

        DB::table('cabinets')
        ->update([
            'nom_cabenit' => $request->nom,
            'logo'        => $fileNameToStore,
            'description' => $request->description,
            'tele'        => $request->tele,
            'adresse'     => $request->adresse,
            'ville'       => $request->ville
        ]);
        return redirect()->route('cabinet');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('admin_pages.User.edit');
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
        DB::table('users')
        ->where('id',Auth::id())
        ->update([
            'name' => $request->name,
            'email' => $request->email
        ]);
        return redirect()->back();
    }

    public function edit_psw(Request $request){

        $this->validate($request,[
            'old_psw' => 'required|password|min:6',
            'new_psw' => 'required|min:6',
            'confirm_psw' => 'required|same:new_psw|min:6'
        ]);

        $psw = $request->confirm_psw;
        if(Hash::check($request->old_psw, auth()->user()->password)){
            DB::table('users')
            ->where('id', Auth::id())
            ->update([
                'password' => Hash::make($psw)
            ]);
            
            return redirect()->route('user.edit')->with(['success' => 'Success Mot de Passe change']);
        }
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $cabenit = Cabinet::find($id);
        if($cabenit){
            $cabenit->destroy($id);
            File::delete(public_path('cabenit/'.$cabenit->logo));
            return redirect()->back();
        }
        else {
           abort('404');
        }
    }
}
