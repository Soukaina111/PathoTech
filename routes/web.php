<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Middleware;

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
     return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/bienvenue', function () {
    return view('dashboard');
});


Auth::routes();



//RECOUPE ROUTES

Route::get('/recoupes', [App\Http\Controllers\DemandesController::class, 'index_RECOUPE'])->name('RECOUPE.index')->middleware('auth');
Route::get('/demande/recoupe/create', [App\Http\Controllers\DemandesController::class, 'create_RECOUPE'])->name('RECOUPE.create')->middleware(['auth', 'tech']);
Route::post('/demande/recoupe/store', [App\Http\Controllers\DemandesController::class, 'store_RECOUPE'])->name('RECOUPE.store')->middleware(['auth', 'tech']);
Route::get('/recoupe/{bloc}', [App\Http\Controllers\DemandesController::class, 'show_RECOUPE'])->name('RECOUPE.show')->middleware(['auth']);
Route::get('/demande/recoupe/{id}/edit', [App\Http\Controllers\DemandesController::class, 'edit_RECOUPE'])->name('RECOUPE.edit')->middleware(['auth', 'tech']);
Route::put('/demande/recoupe/{prv}/update', [App\Http\Controllers\DemandesController::class, 'update_RECOUPE'])->name('RECOUPE.update')->middleware(['auth', 'tech']);
Route::any('/demande/recoupe/{de}/destroy', [App\Http\Controllers\DemandesController::class, 'destroy_RECOUPE'])->name('RECOUPE.destroy')->middleware(['auth', 'tech']);
Route::get('/demande/recoupe/valide', [App\Http\Controllers\DemandesController::class, 'valide_RECOUPE'])->name('RECOUPE.valide')->middleware('auth');
Route::get('/demande/recoupe/attente', [App\Http\Controllers\DemandesController::class, 'attente_RECOUPE'])->name('RECOUPE.attente')->middleware('auth');

//COLORATION ROUTES
Route::get('/COLORATION', [App\Http\Controllers\DemandesController::class, 'index_COLORATION'])->name('COLORATION.index')->middleware('auth');
Route::get('/demande/coloration/create', [App\Http\Controllers\DemandesController::class, 'create_COLORATION'])->name('COLORATION.create')->middleware(['auth', 'tech']);
Route::post('/demande/coloration/store', [App\Http\Controllers\DemandesController::class, 'store_COLORATION'])->name('COLORATION.store')->middleware(['auth', 'tech']);
Route::get('/coloration/{id}', [App\Http\Controllers\DemandesController::class, 'show_COLORATION'])->name('COLORATION.show')->middleware(['auth']);
Route::get('demande/coloration/{id}/edit', [App\Http\Controllers\DemandesController::class, 'edit_COLORATION'])->name('COLORATION.edit')->middleware(['auth', 'tech']);
Route::put('demande/coloration/{prv}/update', [App\Http\Controllers\DemandesController::class, 'update_COLORATION'])->name('COLORATION.update')->middleware(['auth', 'tech']);
Route::any('/demande/coloration/{de}/destroy', [App\Http\Controllers\DemandesController::class, 'destroy_COLORATION'])->name('COLORATION.destroy')->middleware(['auth', 'tech']);
Route::get('/demande/coloration/valide', [App\Http\Controllers\DemandesController::class, 'valide_COLORATION'])->name('COLORATION.valide')->middleware('auth');
Route::get('/demande/coloration/attente', [App\Http\Controllers\DemandesController::class, 'attente_COLORATION'])->name('COLORATION.attente')->middleware('auth');
//IHC ROUTES

Route::get('/IHC', [App\Http\Controllers\DemandesController::class, 'index_IHC'])->name('IHC.index')->middleware('auth');
Route::get('demande/IHC/create', [App\Http\Controllers\DemandesController::class, 'create_IHC'])->name('IHC.create')->middleware(['auth', 'tech']);
Route::post('/demande/IHC/store', [App\Http\Controllers\DemandesController::class, 'store_IHC'])->name('IHC.store')->middleware(['auth', 'tech']);
Route::get('/IHC/{id}', [App\Http\Controllers\DemandesController::class, 'show_IHC'])->name('IHC.show')->middleware(['auth' ]);
Route::get('/IHC/{id}/edit', [App\Http\Controllers\DemandesController::class, 'edit_IHC'])->name('IHC.edit')->middleware(['auth', 'tech']);
Route::put('/IHC/{prv}/update', [App\Http\Controllers\DemandesController::class, 'update_IHC'])->name('IHC.update')->middleware(['auth', 'tech']);
Route::any('/demande/IHC/{de}/destroy', [App\Http\Controllers\DemandesController::class, 'destroy_IHC'])->name('IHC.destroy')->middleware(['auth', 'tech']);
Route::get('/demande/IHC/valide', [App\Http\Controllers\DemandesController::class, 'valide_IHC'])->name('IHC.valide')->middleware('auth');
Route::get('/demande/IHC/attente', [App\Http\Controllers\DemandesController::class, 'attente_IHC'])->name('IHC.attente')->middleware('auth');

//BIOMOL Routes
Route::get('/BIOMOL', [App\Http\Controllers\DemandesController::class, 'index_BIOMOL'])->name('BIOMOL.index')->middleware('auth');
Route::get('/demande/BIOMOL/create', [App\Http\Controllers\DemandesController::class, 'create_BIOMOL'])->name('BIOMOL.create')->middleware(['auth', 'tech']);
Route::post('/demande/BIOMOL/store', [App\Http\Controllers\DemandesController::class, 'store_BIOMOL'])->name('BIOMOL.store')->middleware(['auth', 'tech']);
Route::get('/BIOMOL/{id}', [App\Http\Controllers\DemandesController::class, 'show_BIOMOL'])->name('BIOMOL.show')->middleware(['auth']);
Route::get('demande/BIOMOL/{id}/edit', [App\Http\Controllers\DemandesController::class, 'edit_BIOMOL'])->name('BIOMOL.edit')->middleware(['auth', 'tech']);
Route::put('demande/BIOMOL/{prv}/update', [App\Http\Controllers\DemandesController::class, 'update_BIOMOL'])->name('BIOMOL.update')->middleware(['auth', 'tech']);
Route::any('/demande/BIOMOL/{de}/destroy', [App\Http\Controllers\DemandesController::class, 'destroy_BIOMOL'])->name('BIOMOL.destroy')->middleware(['auth', 'tech']);
Route::get('/demande/BIOMOL/valide', [App\Http\Controllers\DemandesController::class, 'valide_BIOMOL'])->name('BIOMOL.valide')->middleware('auth');
Route::get('/demande/BIOMOL/attente', [App\Http\Controllers\DemandesController::class, 'attente_BIOMOL'])->name('BIOMOL.attente')->middleware('auth');

//DEMANDES ROUTES
Route::get('/Mes_demandes/', [App\Http\Controllers\DemandesController::class, 'mine'])->name('M_Demandes')->middleware(['auth', 'tech']);
Route::get('/Demandes/search', [App\Http\Controllers\DemandesController::class, 'search'])->name('demandes.search')->middleware('auth');
Route::any('/demande/{de}', [App\Http\Controllers\DemandesController::class, 'status'])->name('status.update')->middleware('auth');
Route::get('/Demandes/search/recoupe', [App\Http\Controllers\DemandesController::class, 'search_r'])->name('demandes.search_r')->middleware('auth');
Route::get('/Demandes/search/coloration', [App\Http\Controllers\DemandesController::class, 'search_c'])->name('demandes.search_c')->middleware('auth');
Route::get('/Demandes/search/ihc', [App\Http\Controllers\DemandesController::class, 'search_i'])->name('demandes.search_i')->middleware('auth');
Route::any('/Demandes/{de}/delete', [App\Http\Controllers\DemandesController::class, 'destroy'])->name('demandes.destroy')->middleware('auth');
//USERS
Route::get('/User/create', [App\Http\Controllers\UsersController::class, 'create'])->name('User.create');
