<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Utilisateurs extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom', 'prenoms', 'email', 'mot_de_passe', 'role','api_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'mot_de_passe',
    ];

}
