<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commodity extends Model
{
    protected $fillable = [
        'name',
        'price',
        'stock',
        'unit',
        'description',
        'image_0',
        'image_2',
        'image_3',
        'image_4',
        'image_5',
        'image_6',
        'image_7',
        'image_8',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
