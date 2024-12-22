<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;


class Service extends Model
{
    use HasFactory, Translatable;

    protected $table = 'services';

    protected $fillable = ['image', 'icon'];

    public $translatedAttributes = ['name', 'description'];
}
