<?php

namespace App;

use App\Mail\BareMail;
use App\Notifications\PasswordResetNotification;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordResetNotification($token, new BareMail()));
    }

    /**
     * 投稿レシピとのリレーション
     */
    public function post():HasMany
    {
        return $this->hasMany('App\Post');
    }

    public function followers():BelongsToMany
    {
        return $this->belongsToMany('App\User', 'follows', 'followee_id', 'follower_id')->withTimestamps();
    }

    public function followings():BelongsToMany
    {
        return $this->belongsToMany('App\User', 'follows', 'follower_id', 'followee_id')->withTimestamps();
    }

    public function postLikes():BelongsToMany
    {
        return $this->belongsToMany('App\post', 'post_likes')->withTimestamps();
    }

    public function isFollowedBy(?User $user):bool
    {
        return $user
            ?(bool)$this->followers->where('id', $user->id)->count()
            :false;
    }

    /**
     * フォロワーを取得
     */
    public function getCountFollowersAttribute()
    {
        return $this->followers()->count();
    }

    /**
     * フォロー中の数を取得
     */
    public function getCountFollowingsAttribute()
    {
        return $this->followings()->count();
    }
}
