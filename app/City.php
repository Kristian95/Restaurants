<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'description'
    ];

    public function districts()
    {
        return $this->hasMany('App\District');
    }

    public function restaurants()
    {
        return $this->hasMany('App\Restaurant');
    }
}
