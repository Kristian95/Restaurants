<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Language;

class News extends Model
{
    protected $fillable = [
        'name'
    ];

    public function languages()
    {
        return $this->belongsToMany(Language::class)
            ->withPivot(['title', 'text'])->withTimestamps();
    }
}
