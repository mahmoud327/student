<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use \Astrotomic\Translatable\Translatable;


    protected $table = 'categories';

    public $timestamps = true;
    protected $translationForeignKey = "category_id";
    public $translatedAttributes = ['title'];
    public $translationModel = 'App\Models\Translation\Category';

    protected $fillable = array('parent_id','image');


    public function getImagePathAttribute()
    {
        return $this->image ? asset('uploads/categories/' . $this->image) : asset('uploads/default.jpeg');

    }



}

