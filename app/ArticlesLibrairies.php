<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticlesLibrairies extends Model
{
    public $table='articleslibrairies';
    // protected $primaryKey = ['code_article', 'librairie_id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code_article', 'librairie_id',
    ];
}
