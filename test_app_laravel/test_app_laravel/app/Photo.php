<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Product;

class Photo extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'product_id',
        'photo'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
