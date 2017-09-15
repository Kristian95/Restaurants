<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
