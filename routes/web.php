<?php

use App\Http\Controllers\patientController;
use App\Http\Controllers\RendeyVousController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FacturationController;
use App\Http\Controllers\TraitementController;
use App\Http\Controllers\MedicamentController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\OrdonnanceController;
use App\Http\Controllers\ActeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;

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
    Route::get('details/{id}', [patientController::class,"detail"])->name('patient.detail');
    Route::post('add', [patientController::class,"insert"])->name('patient.add');
    Route::get('update/{id}', [patientController::class,"update"])->name('patient.update');
    Route::post('update/{id}', [patientController::class,"update"])->name('patient.update');
    Route::get('delete/{id}', [patientController::class,"delete"])->name('patient.delete');

    //Json http
    Route::post('/search', [patientController::class,'search'])->name('patient.search');
    
});

// facturations routes
Route::prefix('facturation')->group(function () {
    Route::get('manage', [FacturationController::class,"index"])->name('fact.manage');
    Route::get('details/{id}', [FacturationController::class,"detail"])->name('fact.detail');
    Route::post('add', [FacturationController::class,"insert"])->name('fact.add');
    Route::get('modifier/{id}', [FacturationController::class,"edit"])->name('fact.modifier');
    Route::post('update/{id}', [FacturationController::class,"update"])->name('fact.update');
    Route::get('delete/{id}', [FacturationController::class,"delete"])->name('fact.delete'); 
});

// Rendey-vous routes
Route::prefix('rendy-vous')->group(function () {
    Route::get('manage', [RendeyVousController::class,"index"])->name('rdv.manage');
    Route::get('filter/{id}', [RendeyVousController::class,"filtrer"])->name('rdv.filter');
    Route::post('search', [RendeyVousController::class,"search"])->name('rdv.search');
    Route::get('update/{id}', [RendeyVousController::class,"update"])->name('rdv.update');
    Route::post('update/{id}', [RendeyVousController::class,"update"])->name('rdv.update');
    Route::get('insert/{id}', [RendeyVousController::class,"insert"])->name('rdv.insert');
    Route::post('ajouter', [RendeyVousController::class,"ajouter"])->name('rdv.ajouter');
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

// Medicament routes
Route::prefix('medicament')->group(function () {
    Route::get('manage', [MedicamentController::class,"index"])->name('medicament.manage');

    //Json http
    Route::get('/getJson', [MedicamentController::class,'show']);
    Route::post('/getJson', [MedicamentController::class,'search']);
    Route::post('/sendJson', [MedicamentController::class,'store']);
    Route::post('/updateJson', [MedicamentController::class,'update']);
    Route::post('/delete', [MedicamentController::class,'destroy']);
    
});

// traitements routes
Route::prefix('traitement')->group(function () {
    Route::get('modifier/{id}', [TraitementController::class,"modifier"])->name('traitement.modifier');
    Route::post('update/{id}', [TraitementController::class,"update"])->name('traitement.update');
    Route::post('insert/{id}', [TraitementController::class,"insert"])->name('traitement.insert');
    Route::get('ajouter/{id}', [TraitementController::class,"ajouter"])->name('traitement.ajouter');
    Route::get('delete/{id}', [TraitementController::class,"delete"])->name('traitement.delete');
});

// consulations routes 
Route::prefix('consultation')->group(function () {
    Route::get('filter/{id}', [ConsultationController::class,"filtrer"])->name('Consultation.filter');
    Route::post('search', [ConsultationController::class,"search"])->name('Consultation.search');
    Route::get('modifier/{id}', [ConsultationController::class,"modifier"])->name('Consultation.modifier');
    Route::post('update/{id}', [ConsultationController::class,"update"])->name('Consultation.update');
    Route::post('insert/{id}', [ConsultationController::class,"insert"])->name('Consultation.insert');
    Route::get('ajouter/{id}', [ConsultationController::class,"ajouter"])->name('consultation.ajouter');
    Route::get('delete/{id}', [ConsultationController::class,"delete"])->name('Consultation.delete');
    Route::get('filter/{id}', [ConsultationController::class,"filtrer"])->name('Consultation.filter');
    
});

// ordonnance routes

Route::prefix('ordonnance')->group(function () {
    Route::get('manage/{id}', [OrdonnanceController::class,'index'])->name('ord.manage');
    Route::post('insert', [OrdonnanceController::class,"store"])->name('ordonnance.insert');
    Route::get('show/{ordonnance}', [OrdonnanceController::class,"show"])->name('ordonnance.show');
});

Auth::routes();
Route::any('/register',function(){
 return '404 | not found';
});

