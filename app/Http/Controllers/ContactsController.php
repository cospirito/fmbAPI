<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contacts;

class ContactsController extends Controller
{
     /**
     * index : On retourne toutes les Contacts de la db
     *
     * @param  mixed $request
     * @return void
     */
    public function index(Request $request)
    {
        return Contacts::all();
    }

     /**
     * show : Retourn la contact dont l'id à été fournis dans la requete
     *
     * @param  mixed $request
     * @param  mixed $contact
     * @return void
     */
    public function show(Request $request, Contacts $contact)
    {
        return $contact;
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

        $contact = $request->input();

        //On enregistre la contact
        Contacts::create($contact);

        return response()->json($contact, 201);
        
    }

    /**
     * update : Mise àjour de la contact dont l'id est fournis
     *
     * @param  mixed $request
     * @param  mixed $contact
     * @return void
     */
    public function update(Request $request, Contacts $contact)
    {
        $contact->update($request->input());

        return response()->json($contact, 200);
    }

    /**
     * delete : Suppression de la contact 
     *
     * @param  mixed $request
     * @param  mixed $contact
     * @return void
     */
    public function delete(Request $request, Contacts $contact)
    {
        $contact->delete();
        
        return response()->json(null, 204);
    }
}
