<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articles;

class ArticlesController extends Controller
{
        
        
    /**
     * index
     *
     * Par défaut retourne tous les articles de la db
     * @param  mixed $request
     * @return void
     */
    public function index(Request $request)
    {
        return Articles::all();
    }
    
    /**
     * show
     *
     * Retourne toutes les données de l'article fournis 
     * @param  mixed $request
     * @param  mixed $article
     * @return void
     */
    public function show(Request $request, Articles $article)
    {
        return $article;
    }
    
    /**
     * save
     *
     * Ajoute l'article fournis dans la db
     * @param  mixed $request
     * @return void
     */
    public function save(Request $request)
    {
        $article = Articles::create($request->all());

        return response()->json($article, 201);
    }
    
    /**
     * update
     * Mise à jour de l'article fournis 
     *
     * @param  mixed $request
     * @param  mixed $artcile
     * @return void
     */
    public function update(Request $request, Articles $article)
    {
        
        $article->update($request->input());

        return response()->json($article, 200);
    }
    
    /**
     * delete : 
     * Supprime l'article fournis en parametre
     *
     * @param  mixed $request
     * @param  mixed $article
     * @return void
     */
    public function delete(Request $request, Articles $article)
    {
        $article->delete();

        return response()->json(null, 204);
    }
}
