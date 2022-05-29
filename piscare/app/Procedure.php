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

    public function post(): BelongsTo
    {
        return $this->belongsTo('App\Post');
    }
}
