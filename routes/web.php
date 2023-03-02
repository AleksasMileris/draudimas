<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\OwnersController;
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
Route::get('/', [OwnersController::class,'index'])->name("index");
Route::get('/cars', [CarController::class,'index'])->name('cars.index');

Route::middleware(['auth'])->group(function(){

    Route::get('/owners/create',[OwnersController::class,'create'])->name('owners.create')->middleware('checkAdmin');
    Route::post('/owners/store',[OwnersController::class,'store'])->name('owners.store');
    Route::get('/owners/{id}/update',[OwnersController::class,'update'])->name("owners.update");
    Route::post("/owners/{id}/save",[OwnersController::class,'save'])->name('owners.save');
    Route::get('/owners/{id}/delete',[OwnersController::class,'delete'])->name("owners.delete");

    Route::resource('cars', CarController::class)->except([
        'index'
    ]);


});
Route::middleware(['checkAdmin'])->group(function(){
    Route::get('/owners/create',[OwnersController::class,'create'])->name('owners.create');
    Route::post('/owners/store',[OwnersController::class,'store'])->name('owners.store');
    Route::get('/owners/{id}/update',[OwnersController::class,'update'])->name("owners.update");
    Route::post("/owners/{id}/save",[OwnersController::class,'save'])->name('owners.save');
    Route::get('/owners/{id}/delete',[OwnersController::class,'delete'])->name("owners.delete");

    Route::resource('cars', CarController::class)->except([
        'index'
    ]);
});






Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
