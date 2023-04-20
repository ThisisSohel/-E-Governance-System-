<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mainController;

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



Route::get('/test', [mainController::class, 'test']);











Route::get('/logout',  [mainController::class, 'logout']);


Route::view('/', 'index');
Route::post('/auth',  [mainController::class, 'login_check']);
Route::get('/dashboard', [mainController::class, 'dashboard']);



// for doctor
Route::post('/apptoken',  [mainController::class, 'apptokenchk']);
Route::get('/dashboard/interface', [mainController::class, 'dashboardInterface']);
Route::post('/patientExit', [mainController::class, 'patientExit']);
// ----------



















Route::get('/auth',  [mainController::class, 'login_check_get']);




Route::post('/billeraccess',  [mainController::class, 'billeraccess']);

Route::post('/testreg',  [mainController::class, 'testreg']);
Route::post('/labtokenvalidate',  [mainController::class, 'labtokenvalidate']);


Route::post('/overridedoc',  [mainController::class, 'overridedoc']);
Route::post('/overridetest',  [mainController::class, 'overridetest']);






