<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Term extends Model
{
    use HasFactory, Translatable;

    protected $table = 'terms';

    public $translatedAttributes = ['term1', 'term2', 'term3', 'term4', 'term5', 'term6', 'term7', 'term8', 'term9', 'term10'];
}
