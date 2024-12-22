<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SocialLinks extends Model
{
    use HasFactory, Translatable;

    protected $table = 'social_links';

    protected $fillable = ['icon', 'link'];

    public $translatedAttributes = ['name', 'description', 'address'];
}
