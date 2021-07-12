<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;

class CategoriesController extends Controller
{
     /**
     * index : On retourne toutes les Categories de la db
     *
     * @param  mixed $request
     * @return void
     */
    public function index(Request $request)
    {
        return Categories::all();
    }

     /**
     * show : Retourn la categorie dont l'id à été fournis dans la requete
     *
     * @param  mixed $request
     * @param  mixed $categorie
     * @return void
     */
    public function show(Request $request, Categories $categorie)
    {
        return $categorie;
    }

    /**
     * save
     *
     * @param  mixed $request
     * @return void
     */
    public function save(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nom' => 'bail|required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->messages()->first(), 500);
        }

        $categorie = $request->input();

        //On enregistre la categorie
        Categories::create($categorie);

        return response()->json($categorie, 201);
        
    }

    /**
     * update : Mise àjour de la categorie dont l'id est fournis
     *
     * @param  mixed $request
     * @param  mixed $categorie
     * @return void
     */
    public function update(Request $request, Categories $categorie)
    {
        $categorie->update($request->input());

        return response()->json($categorie, 200);
    }

    /**
     * delete : Suppression de la categorie 
     *
     * @param  mixed $request
     * @param  mixed $categorie
     * @return void
     */
    public function delete(Request $request, Categories $categorie)
    {
        $categorie->delete();
        
        return response()->json(null, 204);
    }
}
