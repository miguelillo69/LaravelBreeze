<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GangaController;
use App\Http\Controllers\ProfileController;
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

Route::get('/',[GangaController::class,'index'])->name('inici');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::put('/like/{id}', [GangaController::class, 'like'])->name('gangas.like');
Route::put('/unlike/{id}', [GangaController::class, 'unlike'])->name('gangas.unlike');
Route::get('/autor/{id}', [GangaController::class, 'autor'])->name('gangas.autor');

Route::resource('categories',CategoryController::class)->only( 'index','show','edit' , 'update' , 'destroy','create','store');
Route::resource('gangas',GangaController::class)->only(  'edit' , 'update' , 'destroy','create')->middleware('roles');
Route::resource('gangas',GangaController::class)->except( 'edit' , 'update' , 'destroy','create');

require __DIR__.'/auth.php';
