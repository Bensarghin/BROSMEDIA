<?php

use App\Http\Controllers\patientController;
use App\Http\Controllers\acceuilController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [acceuilController::class,"index"])->name('home.index');

Route::prefix('patient')->group(function () {
    Route::get('manage', [patientController::class,"index"])->name('patient.manage');
    
});
