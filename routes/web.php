<?php

use App\Http\Controllers\patientController;
use App\Http\Controllers\RendeyVousController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ActeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('home');
})->middleware('auth');

// patient routes
Route::prefix('patient')->group(function () {
    Route::get('manage', [patientController::class,"index"])->name('patient.manage');
    Route::post('add', [patientController::class,"insert"])->name('patient.add');
    Route::get('update/{id}', [patientController::class,"update"])->name('patient.update');
    Route::post('update/{id}', [patientController::class,"update"])->name('patient.update');
    Route::get('delete/{id}', [patientController::class,"delete"])->name('patient.delete');

    //Json http
    Route::get('/getJson', [HomeController::class,'getdata']);
    Route::post('/getJson', [HomeController::class,'filtrer']);
    
});

// Rendey-vous routes
Route::prefix('rendy-vous')->group(function () {
    Route::get('manage', [RendeyVousController::class,"index"])->name('rdv.manage');
    Route::post('add', [RendeyVousController::class,"insert"])->name('rdv.add');
    Route::get('update/{id}', [RendeyVousController::class,"update"])->name('rdv.update');
    Route::post('update/{id}', [RendeyVousController::class,"update"])->name('rdv.update');
    Route::get('delete/{id}', [RendeyVousController::class,"delete"])->name('rdv.delete');
    
});

// Actes routes
Route::prefix('acte')->group(function () {
    Route::get('manage', [ActeController::class,"index"])->name('acte.manage');
    Route::post('add', [ActeController::class,"insert"])->name('acte.add');
    Route::get('update/{id}', [ActeController::class,"update"])->name('acte.update');
    Route::post('update/{id}', [ActeController::class,"update"])->name('acte.update');
    Route::get('delete/{id}', [ActeController::class,"delete"])->name('acte.delete');

    //Json http
    Route::get('/getJson', [ActeController::class,'show']);
    Route::post('/getJson', [ActeController::class,'search']);
    
});

Auth::routes();
Route::any('/register',function(){
 return '404 | not found';
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

