<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RecipeMaterial extends Model
{

    public function recipe(): BelongsTo
    {
        return $this->belongsTo('App\Recipe', 'id', 'resipeId');
    }

    protected $fillable = [
        'recipeId',
        'order',
        'name',
    ];
}
