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
Route::get('bienvenue', function () {
    return view('bienvenue', ['nom' => 'Robert Duchmol']);
});

Route::any('/',[\App\Http\Controllers\HomeController::class,"accueil"]);
Route::any('/apropos',[\App\Http\Controllers\HomeController::class,"apropos"]);

Route::match(['get', 'post'], '/accueil', function () {
    return "<h2>coucou</h2>";
});

Route::any('/sports',[SportController::class,"index"]);

Route::view('/vue', 'acceuil');

Route::get('/taches/{id}/suivis/{idSuivi}', function ($idTache, $idSuiviExe) {
    return "Suivi d'exécution ".$idSuiviExe." de la tâche ".$idTache;
});

Route::get('taches/{categorie?}', function ($cat = 'A Faire') {
    return 'Les tâches de la catégorie '.$cat;
});

Route::get('taches/{id}', function ($id) {
    return 'Tâche '.$id;
})->where('id', '[0-9]+');

Route::get('taches/{id}', function ($id) {
    return 'Tâche '.$id;
})->name('tache.show');
//$url = route('tache.show');
//
//$url = route('tache.show', ['id' => 4]);
//return redirect()->route('tache.show');

