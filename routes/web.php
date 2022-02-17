<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MOTController;
use App\Http\Controllers\ReminderController;

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
    return view('welcome');
});

Route::get('/your-car', [MOTController::class, 'results']);
Route::post('/reminder', [ReminderController::class, 'reminder']);