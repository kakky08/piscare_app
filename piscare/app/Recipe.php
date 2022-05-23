<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Recipe extends Model
{
    protected $fillable = [
        'id',
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

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\User');
    }

    public function recipeMaterial(): HasMany
    {
        return $this->hasMany('App\RecipeMaterial' , 'recipeId', 'id');
    }


    public function likes(): BelongsToMany
    {
        return $this->belongsToMany('App\User', 'recipe_likes')->withTimestamps();
    }

    public function isLikedBy(?User $user): bool
    {
        return $user
            ?(bool)$this->likes->where('id', $user->id)->count()
            : false;
    }

    public function getCountLikesAttribute(): int
    {
        return $this->likes->count();
    }
}
