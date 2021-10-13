<?php

use App\Http\Controllers\patientController;
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
Route::get('/test', function () {
    return view('test2');
});
Route::prefix('patient')->group(function () {
    Route::get('manage', [patientController::class,"index"])->name('patient.manage');
    Route::post('add', [patientController::class,"insert"])->name('patient.add');
    
});

Auth::routes();
Route::any('/register',[App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

