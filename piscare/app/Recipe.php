<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Recipe extends Model
{
    protected $fillable = [
        'recipeId',
        'categoryId',
        'searchCategoryId',
        'title',
        'url',
        'foodImageUrl',
        'mediumImageUrl',
        'smallImageUrl',
        'contributor',
        'description',
        'indication',
        'cost',
    ];

    public function recipeMaterial(): HasMany
    {
        return $this->hasMany('App\RecipeMaterial','recipeId', 'recipeId');
    }


    public function likes(): BelongsToMany
    {
        return $this->belongsToMany('App\User', 'likes')->withTimestamps();
    }

    public function isLikedBy(?User $user): bool
    {
        return $user
            ?(bool)$this->likes->where('id', $user->id)->count()
            : false;
    }

    public function getCountLikesAttribute(): int
    {
        return $this->recipe_likes->count();
    }
}
