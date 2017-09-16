<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 
        'city_id', 
        'title', 
        'description', 
        'mediumtext'  
    ];

    public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function manager()
    {
        return $this->hasOne('App\Manager');
    }
}
