<?php

use App\Http\Controllers\RecordController;
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

Route::get('/', function () {
    return '<html><title>Server</title><body><h1>Server</h1></body></html>';
});



Route::post('/postPrescription', [RecordController::class, 'post_prescription']);




Route::get('/getrecordsdefault/{pid}/{department}', [RecordController::class, 'get_prescription_default']);

Route::get('/gettestdefault/{pid}/{hospital_name}', [RecordController::class, 'gettestdefault']);



Route::get('/getrecordsoverride/{pid}/{override_key}', [RecordController::class, 'get_prescription_override']);

Route::get('/gettestdefaultoverride/{pid}/{override_key}', [RecordController::class, 'gettestdefault_override']);


