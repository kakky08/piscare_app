<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Record extends Model
{
    public function user():BelongsTo
    {
        return $this->belongsTo('App\User');
    }

    public function isRecord(?User $user, $date)
    {
        $is_record = Record::where('user_id', $user->id)->where('date', $date)->first();
        return $is_record
            ? true
            : false;
    }
}
