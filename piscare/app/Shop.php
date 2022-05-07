<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable =
    [
        'shop_id',
        'name',
        'catch',
        'shop_image',
        'middle_area_code',
        'shop_url',
    ];
}
