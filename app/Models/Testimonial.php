<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Testimonial extends Model
{
    use HasFactory, Translatable;

    protected $table = 'testimonials';

    protected $fillable = ['image'];

    public $translatedAttributes = ['name', 'description'];
}
