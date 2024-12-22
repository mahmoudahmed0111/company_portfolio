<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory, Translatable;

    protected $table = 'projects';

    public $translatedAttributes = ['name', 'description'];

    // علاقة الصور بالمشروع
    public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }
}

