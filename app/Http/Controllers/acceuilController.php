<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Patient;

use Illuminate\Http\Request;

class acceuilController extends Controller
{
    public function index()
    {
        $patients=DB::table('patients')->get();
        $patCount=$patients->count();
        return view('home')->with(['patCount'=>$patCount,'patients'=>$patients]);
    }
}
