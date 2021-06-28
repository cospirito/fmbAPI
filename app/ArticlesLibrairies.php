<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticlesLibrairies extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code_article', 'librairie_id',
    ];
}
