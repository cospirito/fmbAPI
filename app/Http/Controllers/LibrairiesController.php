<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Librairies;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class LibrairiesController extends Controller
{

    private $uploadArticlesImgFolder = "librairies";
    /**
     * index
     *
     * Par défaut retourne toutes les Librairies de la db
     * @param  mixed $request
     * @return void
     */
    public function index(Request $request)
    {
        //On récupère toutes les librairies pour retourner l'url public du logo
        $allLib = Librairies::all();
        foreach ($allLib as $lib)
        {
            $lib->logo = Storage::disk('public')->url($lib->logo);
        }

        return $allLib;
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
        //On retourne l'url d'accès à l'image du livre
        $librairie->logo = Storage::disk('public')->url($librairie->logo);

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
        $validator = Validator::make($request->all(), [
            'nom' => 'bail|required',
            'adresse' => 'bail|required',
            'tel'=> 'bail|required',
            'email' => 'bail|required|unique:librairies',
            'ice' => 'bail|required|unique:librairies'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->messages()->first(), 500);
        }
        
        //On récupère les champs à insérer dans la table librairie
        $libInputs = $request->input();

        //Si le logo de la librairie est fournis alors vérifier sa taille
        if(null !== $request->file('logo'))
        {
            $validator = Validator::make($request->all(), [
                'logo' => 'required|image:jpeg,png,jpg,gif,svg|max:4078',
            ]);
            if ($validator->fails()) {
                return response()->json($validator->messages()->first(), 500);
            }

            $logo = $request->file('logo');
            $logoName = $request->input('ice').'.'.$logo->extension();
            // $image->name = $request->input('code');
            $image_uploaded_path = $logo->storeAs($this->uploadArticlesImgFolder, $logoName, 'public');
            $libInputs['logo'] = $image_uploaded_path;
        }

        $librairie = Librairies::create($libInputs);
        if(isset($image_uploaded_path)){
            $librairie->logo = Storage::disk('public')->url($image_uploaded_path);
        }
        
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
        //On suprime la librairie de la db
        $librairie->delete();

        //On suprime le logo de la librairie si le logo existe
        if(isset($librairie->logo) && $librairie->logo !== null && $librairie->logo !="")
            Storage::disk('public')->delete($librairie->logo);
        
        return response()->json(null, 204);
    }
}
