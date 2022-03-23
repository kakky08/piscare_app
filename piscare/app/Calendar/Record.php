<?php

namespace App\Calendar;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Record extends Model
{
    const YES = 1;
    const NO = 2;

    protected $table = 'records';

    protected $fillble =
    [
        'date',
        'flag_breakfast',
        'flag_lunch',
        'flag_dinner',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\User');
    }
}
