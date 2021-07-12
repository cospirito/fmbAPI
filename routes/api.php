<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\LibrairiesController;
use App\Http\Controllers\UtilisateursController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CollectionsController;


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


//APIs pour la gestion des utilisateurs (Ajouter, afficher, supprimer et modifier)
//
//Retourne tous les utilisateurs de la db
Route::get('utilisateurs',  [UtilisateursController::class, 'index']);

//Retourne utilisateurs dont l'id est spéicifé
Route::get('utilisateurs/{utilisateur}', [UtilisateursController::class,'show']);

//Ajouter un nouvel utilisateur
Route::post('utilisateurs', [UtilisateursController::class,'save']);

//Mise à jour d'un utilisateurs (utilisateur ayant l'id)
Route::put('utilisateurs/{utilisateur}', [UtilisateursController::class,'update']);

//Supprimer un utilisateur
Route::delete('utilisateurs/{utilisateur}', [UtilisateursController::class,'delete']);
/*
    Fin des routes utilisateurs
*/


//APIs pour la gestion des categories (Ajouter, afficher, supprimer et modifier)
//
//Retourne tous les categories de la db
Route::get('categories',  [CategoriesController::class, 'index']);

//Retourne categories dont l'id est spéicifé
Route::get('categories/{categorie}', [CategoriesController::class,'show']);

//Ajouter un nouvel categories
Route::post('categories', [CategoriesController::class,'save']);

//Mise à jour d'un categories (categorie ayant l'id)
Route::put('categories/{categorie}', [CategoriesController::class,'update']);

//Supprimer un categorie
Route::delete('categories/{categorie}', [CategoriesController::class,'delete']);
/*
    Fin des routes categories
*/


//APIs pour la gestion des collections (Ajouter, afficher, supprimer et modifier)
//
//Retourne tous les collections de la db
Route::get('collections',  [CollectionsController::class, 'index']);

//Retourne collections dont l'id est spéicifé
Route::get('collections/{collection}', [CollectionsController::class,'show']);

//Ajouter un nouvel collections
Route::post('collections', [CollectionsController::class,'save']);

//Mise à jour d'un collections (collection ayant l'id)
Route::put('collections/{collection}', [CollectionsController::class,'update']);

//Supprimer un collection
Route::delete('collections/{collection}', [CollectionsController::class,'delete']);
/*
    Fin des routes collections
*/