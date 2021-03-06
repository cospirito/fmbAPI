<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Librairies extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom', 'adresse', 'tel', 'site_url', 'logo', 'ice', 'email',
    ];
}
