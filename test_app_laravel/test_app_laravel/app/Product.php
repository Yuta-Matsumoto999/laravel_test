<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\TagCategory;
use App\Photo;
use App\Favorite;
use Auth;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'tag_category_id',
        'name',
        'content',
        'price',
        'postal'
    ];

    protected $dates = [
        'updated_at'
    ];

    public function tagCategories()
    {
        return $this->belongsTo(TagCategory::class, 'tag_category_id');
    }

    public function photo()
    {
        return $this->hasMany(Photo::class, 'product_id');
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'product_id');
    }
}