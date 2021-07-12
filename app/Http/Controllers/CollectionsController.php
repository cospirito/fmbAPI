<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collections;

class CollectionsController extends Controller
{
    /**
     * index : On retourne toutes les collections de la db
     *
     * @param  mixed $request
     * @return void
     */
    public function index(Request $request)
    {
        return Collections::all();
    }

     /**
     * show : Retourn la collection dont l'id à été fournis dans la requete
     *
     * @param  mixed $request
     * @param  mixed $collection
     * @return void
     */
    public function show(Request $request, Collections $collection)
    {
        return $collection;
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

        $collection = $request->input();

        //On enregistre la collection
        Collections::create($collection);

        return response()->json($collection, 201);
        
    }
    
    /**
     * update : Mise àjour de la collection dont l'id est fournis
     *
     * @param  mixed $request
     * @param  mixed $collection
     * @return void
     */
    public function update(Request $request, Collections $collection)
    {
        $collection->update($request->input());

        return response()->json($collection, 200);
    }

    /**
     * delete : Suppression de la collection 
     *
     * @param  mixed $request
     * @param  mixed $collection
     * @return void
     */
    public function delete(Request $request, Collections $collection)
    {
        $collection->delete();
        
        return response()->json(null, 204);
    }
}
