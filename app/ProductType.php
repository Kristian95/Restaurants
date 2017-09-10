<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'product_type';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];
}
