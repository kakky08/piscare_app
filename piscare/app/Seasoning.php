<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Seasoning extends Model
{
    protected $fillable = [
        'post_recipe_id',
        'seasoning_name',
        'quantity',
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo('App\Post');
    }
}
