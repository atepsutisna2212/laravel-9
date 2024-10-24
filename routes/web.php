<?php

use App\Http\Controllers\CEmployee;
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

// Route::get('/', function () {
//     return view('cek');
// });
Route::get('/', [CEmployee::class, 'index']);
Route::post('/employee/getData', [CEmployee::class, 'getData']);
Route::resource('employee', CEmployee::class);
Route::post('/employee/{employee}', [CEmployee::class, 'update']);
