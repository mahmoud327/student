<?php

namespace App\Models\Translation;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    protected $table = "product_translations";

    protected $fillable = ['name','desc','locale','product_id'];

    protected $guarded = ['product_id'];

    public $timestamps = false;

}
