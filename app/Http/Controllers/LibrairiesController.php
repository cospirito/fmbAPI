<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Librairies;

class LibrairiesController extends Controller
{
    /**
     * index
     *
     * Par défaut retourne toutes les Librairies de la db
     * @param  mixed $request
     * @return void
     */
    public function index(Request $request)
    {
        return Librairies::all();
    }
    
    /**
     * show
     *
     * Retourne toutes les données de librairies fournis 
     * @param  mixed $request
     * @param  mixed $librairie
     * @return void
     */
    public function show(Request $request, Librairies $librairie)
    {
        return $librairie;
    }
    
    /**
     * save
     *
     * Ajoute librairies fournis dans la db
     * @param  mixed $request
     * @return void
     */
    public function save(Request $request)
    {
        $librairie = Librairies::create($request->all());

        return response()->json($librairie, 201);
    }
    
    /**
     * update
     * Mise à jour de librairies fournis 
     *
     * @param  mixed $request
     * @param  mixed $artcile
     * @return void
     */
    public function update(Request $request, Librairies $librairie)
    {
        
        $librairie->update($request->input());

        return response()->json($librairie, 200);
    }
    
    /**
     * delete : 
     * Supprime librairies fournis en parametre
     *
     * @param  mixed $request
     * @param  mixed $librairie
     * @return void
     */
    public function delete(Request $request, Librairies $librairie)
    {
        $librairie->delete();

        return response()->json(null, 204);
    }
}
