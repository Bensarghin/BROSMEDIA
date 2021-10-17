<?php

use App\Http\Controllers\patientController;
use App\Http\Controllers\RendeyVousController;
use App\Http\Controllers\HomeController;
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
Route::get('/getdata', [HomeController::class,'getdata']);
Route::post('/getdata', [HomeController::class,'filtrer']);

Route::prefix('patient')->group(function () {
    Route::get('manage', [patientController::class,"index"])->name('patient.manage');
    Route::post('add', [patientController::class,"insert"])->name('patient.add');
    Route::get('update/{id}', [patientController::class,"update"])->name('patient.update');
    Route::post('update/{id}', [patientController::class,"update"])->name('patient.update');
    Route::get('delete/{id}', [patientController::class,"delete"])->name('patient.delete');
    
});

Route::prefix('rendy-vous')->group(function () {
    Route::get('manage', [RendeyVousController::class,"index"])->name('rdv.manage');
    Route::post('add', [RendeyVousController::class,"insert"])->name('rdv.add');
    Route::get('update/{id}', [RendeyVousController::class,"update"])->name('rdv.update');
    Route::post('update/{id}', [RendeyVousController::class,"update"])->name('rdv.update');
    Route::get('delete/{id}', [RendeyVousController::class,"delete"])->name('rdv.delete');
    
});

Auth::routes();
Route::any('/register',[App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

