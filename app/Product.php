<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'id',
        'retailer_id',
        'name',
        'price',
        'image',
        'description',
        'email_retailer',

    ];

    public function retailer()
    {
        return $this->belongsTo('App\Retailer');
    }
}
