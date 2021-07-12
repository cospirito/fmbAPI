<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utilisateurs;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UtilisateursController extends Controller
{
    /**
     * index : On retourne tous les users de l'application
     *
     * @param  mixed $request
     * @return void
     */
    public function index(Request $request)
    {
        return Utilisateurs::all();
    }
    
    /**
     * show : Retourn l'utilisateur dont l'id à été fournis dans la requete
     *
     * @param  mixed $request
     * @param  mixed $utilisateur
     * @return void
     */
    public function show(Request $request, Utilisateurs $utilisateur)
    {
        return $utilisateur;
    }
    
    /**
     * save
     *
     * @param  mixed $request
     * @param  mixed $utilisateur
     * @return void
     */
    public function save(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nom' => 'bail|required',
            'prenoms' => 'bail|required',
            'email' => 'bail|required|unique:utilisateurs',
            'mot_de_passe' => 'bail|required',
            'role' => [
                        'bail', 
                        Rule::In(['ADMIN', 'USER'])
                    ]
        ]);
        if ($validator->fails()) {
            return response()->json($validator->messages()->first(), 500);
        }

        $utilisateur = $request->input();

        $utilisateur['mot_de_passe'] = Hash::make($utilisateur['mot_de_passe']);
        $utilisateur['api_token'] = Str::random(70);

        //On enregistre l'utilisateur
        users::create($utilisateur);

        return response()->json($utilisateur, 201);
        
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $utilisateur
     * @return void
     */
    public function update(Request $request, Utilisateurs $utilisateur)
    {
        $utilisateur->update($request->input());

        return response()->json($utilisateur, 200);
    }
    
    /**
     * delete
     *
     * @param  mixed $request
     * @param  mixed $utilisateur
     * @return void
     */
    public function delete(Request $request, Utilisateurs $utilisateur)
    {
        $utilisateur->delete();
        
        return response()->json(null, 204);
    }
}
