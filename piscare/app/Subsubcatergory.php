<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subsubcatergory extends Model
{
    protected $fillable = [
        'categoryId',
        'categoryName',
        'parentCategoryId',
        'searchCategoryId',
        'searchRecipeId',
    ];
}
