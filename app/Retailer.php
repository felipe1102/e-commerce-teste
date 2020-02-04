<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retailer extends Model
{
    protected $table = 'retailers';

    protected $fillable = [
        'name',
        'logo',
        'description',
        'website',
    ];

    public function product(){
        return $this->hasMany('App\Product');
    }

}
