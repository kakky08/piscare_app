<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Record extends Model
{
    protected $fillable = [
        'user_id',
        'date',
        'flag_breakfast',
        'flag_lunch',
        'flag_dinner',
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo('App\User');
    }

}
