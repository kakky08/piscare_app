<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Procedure extends Model
{
    protected $fillable = [
        'post_recipe_id',
        'order',
        'photo',
        'procedure'
    ];

    public function postRecipe(): BelongsTo
    {
        return $this->belongsTo('App\PostRecipe');
    }
}
