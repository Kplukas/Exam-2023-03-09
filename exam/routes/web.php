<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CanteenController as CC;
use App\Http\Controllers\FoodlistController as FL;

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

Route::prefix('canteen')->name('canteen-')->group(function () {
    Route::get('/', [CC::class, 'index'] )->name('index')->middleware('roles:A');
    Route::get('/list', [CC::class, 'index2'] )->name('index2')->middleware('roles:A|C');
    Route::get('/create', [CC::class, 'create'] )->name('create')->middleware('roles:A');
    Route::post('/create', [CC::class, 'store'] )->name('store')->middleware('roles:A');
    Route::get('/edit/{canteen}', [CC::class, 'edit'] )->name('edit')->middleware('roles:A');
    Route::get('/show/{canteen}', [CC::class, 'show'] )->name('show')->middleware('roles:A|C');
    Route::put('/edit/{canteen}', [CC::class, 'update'] )->name('update')->middleware('roles:A');
    Route::delete('/delete/{canteen}', [CC::class, 'destroy'])->name('delete')->middleware('roles:A');
});
Route::prefix('foodlist')->name('foodlist-')->group(function () {
    Route::get('/', [FL::class, 'index'] )->name('index')->middleware('roles:A');
    Route::get('/list', [FL::class, 'index2'] )->name('index2')->middleware('roles:A|C');
    Route::get('/create', [FL::class, 'create'] )->name('create')->middleware('roles:A');
    Route::post('/create', [FL::class, 'store'] )->name('store')->middleware('roles:A');
    Route::get('/edit/{foodlist}', [FL::class, 'edit'] )->name('edit')->middleware('roles:A');
    Route::get('/show/{foodlist}', [FL::class, 'show'] )->name('show')->middleware('roles:A|C');
    Route::put('/edit/{foodlist}', [FL::class, 'update'] )->name('update')->middleware('roles:A');
    Route::delete('/delete/{foodlist}', [FL::class, 'destroy'])->name('delete')->middleware('roles:A');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
