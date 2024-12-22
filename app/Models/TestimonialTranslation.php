<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestimonialTranslation extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = 'testimonial_translations';

    protected $fillable = ['name', 'description'];
}
