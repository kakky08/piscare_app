<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Material extends Model
{
    protected $fillable = [
        'post_recipe_id',
        'material_name',
        'quantity',
    ];

    public function postRecipe(): BelongsTo
    {
        return $this->belongsTo('App\PostRecipe');
    }
}
