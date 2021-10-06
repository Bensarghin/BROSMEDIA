<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Patient;
class patientController extends Controller
{
    public function index(){
        $patients = DB::table('patients')->find(1);
        return view('dataget',['data'=>$patients]);
    }
}
