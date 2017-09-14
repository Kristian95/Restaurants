<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\UploadImage;

class Language extends Model
{
	use UploadImage;

    public static $filepath = 'uploads/images/languages';

    protected $fillable = [
    	'name', 'code', 'ext'
    ];

    public function news()
    {
        return $this->belongsToMany(News::class)
            ->withPivot(['title', 'text'])->withTimestamps();
    }
}
