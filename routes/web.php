<?php

use App\Http\Controllers\SportController;
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
Route::get('/',function (){
    return view('accueil');
})->name('accueil');

Route::resource('/sports',SportController::class);

Route::get('/home', function () {
    return view('dashboard');
})->middleware(['auth',"verified"])->name('home');

Route::get('/apropos',function(){
    return view('apropos');
})->name('aPropos');

Route::get('/contact',function(){
    return view('contact');
})->name('contacts');

Route::resource('/athletes',\App\Http\Controllers\AthleteController::class);
Route::get('/athletes/{nomSport}/medailleOr',[\App\Http\Controllers\AthleteController::class,'medailleOr'])->name('athletes.or');

//Route::get('/sports',[SportController::class,'index'])->name('sports.index');
//Route::get('/sports/create',[SportController::class,'create']);
//Route::post('/sports',[SportController::class,'store']);
//Route::get('/sports/{sport}',[SportController::class,'show']);
//Route::get('/sports/{sport}/edit',[SportController::class,'edit']);
//Route::put('/sports/{sport}',[SportController::class,'update']);
//Route::delete('/taches/{tache}',[SportController::class,'destroy']);



//Route::get('bienvenue', function () {
//    return view('bienvenue', ['nom' => 'Robert Duchmol']);
//});
//
//Route::get('',function (){});
//
//Route::any('/',[\App\Http\Controllers\HomeController::class,"accueil"]);
//Route::any('/apropos',[\App\Http\Controllers\HomeController::class,"apropos"]);
//Route::any("/apropos",[SportController::class,""]);
//Route::any('/form',[]);
//
//Route::match(['get', 'post'], '/accueil', function () {
//    return "<h2>coucou</h2>";
//});
//
//Route::any('/sports',[SportController::class,"index"]);
//
//Route::view('/vue', 'acceuil');
//
//Route::get('/taches/{id}/suivis/{idSuivi}', function ($idTache, $idSuiviExe) {
//    return "Suivi d'exécution ".$idSuiviExe." de la tâche ".$idTache;
//});
//
//Route::get('taches/{categorie?}', function ($cat = 'A Faire') {
//    return 'Les tâches de la catégorie '.$cat;
//});
//
//Route::get('taches/{id}', function ($id) {
//    return 'Tâche '.$id;
//})->where('id', '[0-9]+');
//
//Route::get('taches/{id}', function ($id) {
//    return 'Tâche '.$id;
//})->name('tache.show');
//$url = route('tache.show');
//
//$url = route('tache.show', ['id' => 4]);
//return redirect()->route('tache.show');

