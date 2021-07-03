<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    //
    public $table = 'articles';
    protected $primaryKey = 'code';
    protected $casts = ['code' => 'string'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'categorie_id', 'collection_id', 'nom', 'auteur', 'prix', 'date_parution', 'description', 
        'langue', 'nb_page', 'editeur',
    ];


}
