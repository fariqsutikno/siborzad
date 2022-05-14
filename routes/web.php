<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataSiswaController;
use App\Http\Controllers\EditingRequestsController;
use App\Http\Controllers\ClassAdministrationController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('/datasiswa')->group(function(){
    Route::get('', DataSiswaController::class . '@index');
});

Route::prefix('/reqs')->name('reqs.')->group(function(){
    Route::get('', EditingRequestsController::class . '@index')->name('index');
    Route::post('ignore', EditingRequestsController::class . '@ignore')->name('ignore');
    Route::post('accept', EditingRequestsController::class . '@accept')->name('accept');
});

Route::prefix('/class')->name('class.')->group(function(){
    Route::get('', ClassAdministrationController::class . '@index')->name('index');
});

