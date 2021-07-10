<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articles;
use App\Librairies as lib;
use App\articleslibrairies as al;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ArticlesController extends Controller
{
        
    private $uploadArticlesImgFolder = 'articles';
    /**
     * index
     *
     * Par défaut retourne tous les articles de la db
     * @param  mixed $request
     * @return void
     */
    public function index(Request $request)
    {
        //On retourne l'url d'accès aux image de tous les articles
        $allArticles = Articles::all();
        foreach ($allArticles as $article)
        {
            $article->image = Storage::disk('public')->url($article->image);
        }
        return $allArticles;
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
        //On retourne l'url d'accès à l'image du livre
        $article->image = Storage::disk('public')->url($article->image);

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
        
        $validator = Validator::make($request->all(), [
            'code' => 'bail|required|unique:articles',
            'categorie_id' => 'bail|required',
            'collection_id'=> 'bail|required',
            'nom'=> 'bail|required',
            'auteur'=> 'bail|required',
            'prix'=> 'bail|required',
            'date_parution'=> 'bail|required',
            'description'=> 'bail|required',
            'langue'=> 'bail|required',
            'nb_page'=> 'bail|required',
            'editeur' => 'bail|required',
            'librairie_id' => 'bail|required',
            'image' => 'required|image:jpeg,png,jpg,gif,svg|max:4078',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->messages()->first(), 500);
        }
        else {
            $image = $request->file('image');
            $imgName = $request->input('code').'.'.$image->extension();
            // $image->name = $request->input('code');
            $image_uploaded_path = $image->storeAs($this->uploadArticlesImgFolder, $imgName, 'public');

            // $uploadedImageResponse = array(
            // "image_name" => basename($image_uploaded_path),
            // "image_url" => Storage::disk('public')->url($image_uploaded_path),
            // "mime" => $image->getClientMimeType()
            // );

            $artcile_lib = lib::where("id", $request->input('librairie_id'))->first();
            if(!empty($artcile_lib))
            {
                //On récupère tous les champs de envoyé dans la query
                $articlesInputs = $request->input();
                $articlesInputs["image"] = $image_uploaded_path;

                //On ajoute l'article dans la db
                $article = Articles::create($articlesInputs);

                //On ajoute la librairie au quel apartien l'article 
                al::create(
                    [
                        'librairie_id' => $request->input('librairie_id'),
                        'code_article' => $request->input('code')
                    ]
                );

                //on récupère et retourne l'article qui vient d'etre insséré
                $lastInsertedArcticle = $article->where("code", $request->input('code'))->first();
                $lastInsertedArcticle["image"] =  Storage::disk('public')->url($image_uploaded_path);

                return response()->json($lastInsertedArcticle, 201);
            }
            else {
                
                return response()->json("la librairie de cet article n'existe pas ", 500);
            }
            
        }
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
        //On supprime le livre de la db
        $article->delete();

        //On suprime l'image du livre du disque serveur
        Storage::disk('public')->delete($article->image);

        return response()->json(null, 204);
    }
}
