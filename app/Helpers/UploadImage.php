<?php

namespace App\Helpers;

use File;
use Html;

trait UploadImage
{
    public static function getFilePath()
    {
        return public_path(static::$filepath);
    }

    public function getFileName()
    {
        return $this->getKey() . '.' . $this->getAttribute('ext');
    }

    public function getImageUrlAttribute()
    {
        return asset(static::$filepath . '/' . $this->getFileName());
    }

    public function getImagePathAttribute()
    {
        return static::getFilePath() . '/' . $this->getFileName();
    }

    public static function boot()
    {
        self::created(function($model) {
            if (request()->hasFile('file')) {
                $model->uploadFile(true);
            }
        });
        self::updating(function($model) {
            if (request()->hasFile('file')) {
                $model->deleteFile();
                $model->uploadFile();
            }
        });
        self::deleting(function($model) {
            $model->deleteFile();
        });
    }

    public function hasImage()
    {
        return File::isFile($this->getFilePath() . '/' . $this->getFileName());
    }

    protected function uploadFile($save = false)
    {
        $file = request()->file('file');
        if (! $file->isValid()) {
            return null;
        }
        $this->ext = $file->getClientOriginalExtension();

        if (! File::isDirectory($this->getFilePath())) {
            File::makeDirectory($this->getFilePath(), 0755, true);
        }

        File::copy($file->getRealPath(), $this->getFilePath() . '/' . $this->getFileName());

        if ($save) {
            $this->save();
        }
    }

    protected function deleteFile()
    {
        $file = $this->getFilePath() . '/' . $this->getFileName();
        if (File::isFile($file)) {
            File::delete($file);
        }
    }

    public function getSmallImageAttribute()
    {
        if (File::isFile($this->getFilePath() . '/' .
            $this->getFileName())) {
            return Html::image($this->getImageUrlAttribute(), '',
                ['class' => 'sm-image']);
        }
        return Html::image(config('constants.no_image_path'), '',
            ['class' => 'sm-image']);
    }

    public function getMediumImageAttribute()
    {
        if (File::isFile($this->getFilePath() . '/' .
            $this->getFileName())) {
            return Html::image($this->getImageUrlAttribute(), '',
                ['class' => 'md-image']);
        }
        return Html::image(config('constants.no_image_path'), '',
            ['class' => 'md-image']);
    }

    public function getLargeImageAttribute()
    {
        if (File::isFile($this->getFilePath() . '/' .
            $this->getFileName())) {
            return Html::image($this->getImageUrlAttribute(), '',
                ['class' => 'lg-image']);
        }
        return Html::image(config('constants.no_image_path'), '',
            ['class' => 'lg-image']);
    }
}
