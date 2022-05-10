<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcatergory extends Model
{
    protected $fillable = [
        'category_id',
        'category_name',
        'parent_category_id',
        'search_category_id',
        'search_recipe_id',
    ];
}
