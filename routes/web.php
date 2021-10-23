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
// acceuil routes
Route::get('/',[HomeController::class,'index'])->middleware('auth');
Route::get('/home',[HomeController::class,'index'])->middleware('auth');
Route::get('home/JsonData',[HomeController::class,'getdata']);
Route::get('/home/getJson',[HomeController::class,'filtrer']);
Route::post('/home/getJson',[HomeController::class,'filtrer']);
Route::post('/home/status',[HomeController::class,'updateStatus']);


// patient routes
Route::prefix('patient')->group(function () {
    Route::get('manage', [patientController::class,"index"])->name('patient.manage');
    Route::post('add', [patientController::class,"insert"])->name('patient.add');
    Route::get('update/{id}', [patientController::class,"update"])->name('patient.update');
    Route::post('update/{id}', [patientController::class,"update"])->name('patient.update');
    Route::get('delete/{id}', [patientController::class,"delete"])->name('patient.delete');

    //Json http
    Route::post('/search', [patientController::class,'search'])->name('patient.search');
    
});

// Rendey-vous routes
Route::prefix('rendy-vous')->group(function () {
    Route::get('manage', [RendeyVousController::class,"index"])->name('rdv.manage');
    Route::get('insert', [RendeyVousController::class,"insert"])->name('rdv.insert');
    Route::get('update/{id}', [RendeyVousController::class,"update"])->name('rdv.update');
    Route::post('update/{id}', [RendeyVousController::class,"update"])->name('rdv.update');
    Route::get('delete/{id}', [RendeyVousController::class,"delete"])->name('rdv.delete');
    
});

// Actes routes
Route::prefix('acte')->group(function () {
    Route::get('manage', [ActeController::class,"index"])->name('acte.manage');

    //Json http
    Route::get('/getJson', [ActeController::class,'show']);
    Route::post('/getJson', [ActeController::class,'search']);
    Route::post('/sendJson', [ActeController::class,'store']);
    Route::post('/updateJson', [ActeController::class,'update']);
    Route::post('/delete', [ActeController::class,'destroy']);
    
});

Auth::routes();
Route::any('/register',function(){
 return '404 | not found';
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

