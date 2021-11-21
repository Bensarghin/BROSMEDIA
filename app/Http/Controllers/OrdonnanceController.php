<?php

namespace App\Http\Controllers;

use App\Models\Ordonnance;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Elibyy\TCPDF\Facades\TCPDF;
use PDF;

class OrdonnanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $medic = DB::table('medicaments')->get();
        $patients = DB::table('patients')
        ->join('rdvs','rdvs.pat_id','=','patients.id')
        ->join('etat_rdvs','etat_rdvs.rdv_id','=','rdvs.id')
        ->join('medecins','medecins.id','=','etat_rdvs.med_id')

        ->select(
        'patients.*',
        'patients.id as pat_id',
        'patients.nom as nom_pat',
        'patients.prenom as prenom_pat',
        'medecins.*',
        'medecins.id as med_id',
        'medecins.nom as nom_med',
        'medecins.prenom as prenom_med')

        ->where('patients.id',$id)
        ->first();

        $ordonnance = Ordonnance::find(1);
        return view('admin_pages.ordonnance.manage',[
            'medic' => $medic,
            'patients' => $patients,
            'ordonnance'=> $ordonnance
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($ord_id)
    {
        $ord = Ordonnance::find($ord_id);
        $pdf = new TCPDF();
        $medicament = $ord->medicament ;
        $html = '<h1 style="color:#ddf" class="text-center">hello pdf</h1><br>';
        foreach($medicament as $medic){
            
            $html.='<h5>'.$medic->nom_medicament.'</h5><br>';
            $html.='<h6>'.$medic->notice_utilisation.'</h6>';
        }
        // $view = \View::make('admin_pages.ordonnance.show', ['ord'=>$ord]);
        // $html = $view->render();
        
        $pdf::SetTitle('Hello World');
        $pdf::AddPage();
        $pdf::writeHTML($html, true, false, true, false, '');

        $pdf::Output('hello_world.pdf');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ord=Ordonnance::create([
            'pat_id' => $request->pat_id,
            'med_id' => $request->med_id
        ]);

        $ord->medicament()->attach($request->medic_id);
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
        return view('admin_pages.ordonnance.show',['ord'=>$ordonnance]);
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
        //
    }
}
