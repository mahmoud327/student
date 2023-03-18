<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserBuyPorduct extends Model
{

    protected $table = 'user_buy_products';
    public $timestamps = true;

    protected $fillable = [
       'product_id',
       'user_id',

    ];

    public function product(){
        return $this->belongsTo('App\Models\Product');
    }
    public function user(){
        return $this->belongsTo('App\Models\User');
    }


}

