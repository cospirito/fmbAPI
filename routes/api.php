<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\LibrairiesController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//APIs pour la gestion des articles (livres)
//
//Retourne tous les articles de la db
Route::get('articles',  [ArticlesController::class, 'index']);

//Retourne l'article dont l'id est spéicifé
Route::get('articles/{article}', [ArticlesController::class,'show']);

//Ajouter un nouvel article
Route::post('articles', [ArticlesController::class,'save']);

//Mise à jour d'un aticle (l'article ayant l'id)
Route::put('articles/{article}', [ArticlesController::class,'update']);

//Supprimer un article
Route::delete('articles/{article}', [ArticlesController::class,'delete']);
/*
    Fin des routes articles
*/

//APIs pour la gestion des librairies (livres)
//
//Retourne tous les librairies de la db
Route::get('librairies',  [LibrairiesController::class, 'index']);

//Retourne librairies dont l'id est spéicifé
Route::get('librairies/{librairie}', [LibrairiesController::class,'show']);

//Ajouter un nouvel librairies
Route::post('librairies', [LibrairiesController::class,'save']);

//Mise à jour d'un librairies (librairies ayant l'id)
Route::put('librairies/{librairie}', [LibrairiesController::class,'update']);

//Supprimer un article
Route::delete('librairies/{librairie}', [LibrairiesController::class,'delete']);
/*
    Fin des routes librairies
*/