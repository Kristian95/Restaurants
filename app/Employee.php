<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'manager_id', 
        'first_name', 
        'last_name', 
        'position', 
        'phone'  
    ];

    public function manager()
    {
        return $this->belongsTo('App\Manager');
    }
}
