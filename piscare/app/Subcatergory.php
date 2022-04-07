<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcatergory extends Model
{
    protected $fillable = [
        'categoryId',
        'categoryName',
        'parentCategoryId',
        'searchCategoryId',
        'searchRecipeId',
    ];
}
