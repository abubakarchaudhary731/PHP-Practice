<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\TestController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/user/{id}', [UserController::class, 'showUsers'])->name('user');


Route::view('add-data', '/addData')->name('add-data');
Route::controller(TestController::class)->group(function(){
    Route::get('data', 'showData')->name('data');
    Route::get('singleuserdata/{id}', 'singleuserdata')->name('singleuserdata');
    Route::post('add',  'addData')->name('add');
    Route::get('delete/{id}', 'deleteData')->name('delete');
    Route::get('update/{id}', 'updatePage')->name('update');
    Route::post('updatedata/{id}', 'updatedData')->name('updatedData');
});


