<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $fillable = [
        'restaurant_id', 'first_name', 'last_name'
    ];

    public function restaurant()
    {
        return $this->belongsTo('App\Restaurant');
    }

    public function employees()
    {
        return $this->hasMany('App\Employee');
    }
}
