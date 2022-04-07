<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = [
        'recipe_id',
        'category_id',
        'search_category_id',
        'title',
        'url',
        'food_image_url',
        'medium_image_url',
        'small_image_url',
        'contributor',
        'description',
        'indication',
        'cost',
    ];

}
