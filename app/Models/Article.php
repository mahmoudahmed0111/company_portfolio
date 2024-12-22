<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory, Translatable;

    protected $table = 'articles';

    protected $fillable = ['image'];

    public $translatedAttributes = ['name', 'description'];
}
