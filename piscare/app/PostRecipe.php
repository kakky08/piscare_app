<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PostRecipe extends Model
{
    protected $fillable = [
        'title',
        'image',
        'people',

    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\User');
    }

    public function likes(): BelongsToMany
    {
        return $this->belongsToMany('APP\User', 'post_recipe_likes')->withTimestamps();
    }

    public function isPostLikedBy(?User $user):bool
    {
        return $user
            ?(bool)$this->post_recipe_likes->where('id', $user->id)->count()
            : false;
    }
}
