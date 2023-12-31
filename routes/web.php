<?php

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AppController::class,"index"]);
Route::get('/projects', [AppController::class,"projects"]);
Route::get('/projects/{id}', [AppController::class,"project_by_id"]);
Route::get('/experience', [AppController::class,"experience"]);

