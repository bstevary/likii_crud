<?php

use App\Http\Controllers\Admins\settings\DesignationsController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('designations')->group(function(){
    Route::get('index',[DesignationsController::class,'index'])->name('desigations.index');
    Route::post('store',[DesignationsController::class,'store'])->name('desigations.store');
    Route::patch('update/{designation}',[DesignationsController::class,'update'])->name('desigations.update');
    Route::delete('delete/{designation}',[DesignationsController::class,'destroy'])->name('desigations.delete');
});