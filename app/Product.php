<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\UploadImage;

class Product extends Model
{
	use UploadImage;

    public static $filepath = 'uploads/images/products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_type_id', 'name', 'price', 'sku', 'description', 'ext' 
    ];

        public function productType()
    {
        return $this->belongsTo('App\ProductType');
    }
}
