<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    use \Astrotomic\Translatable\Translatable;

    protected $with = [
        'translations',
    ];

    protected $appends = [
        'image_path',
    ];


    protected $translationForeignKey = "product_id";
    public $translatedAttributes = ['name', 'desc'];
    public $translationModel = 'App\Models\Translation\Product';
    protected $table = "products";
    protected $fillable = ['price', 'image','category_id'];





    /*
     * ----------------------------------------------------------------- *
     * --------------------------- Accessors --------------------------- *
     * ----------------------------------------------------------------- *
     */


    public function getImagePathAttribute()
    {
        return $this->image ? asset('uploads/products/' . $this->image) : asset('uploads/default.jpeg');
    }


    public function category()
    {
        return  $this->belongsTo('App\Models\Category', 'category_id');
    }


        /*
     * ----------------------------------------------------------------- *
     * ----------------------------- Scopes ---------------------------- *
     * ----------------------------------------------------------------- *
     */



    public function ScopeSearch($q, $search)
    {

        return $q->whereTranslationLike('name', '%' . $search . '%')
            ->orwhereTranslationLike('desc', '%' . $search . '%')
            ->orwhere('price', '%' . $search . '%');

    }

}
