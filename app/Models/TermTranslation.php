<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TermTranslation extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = 'term_translations';

    protected $fillable = ['term1', 'term2', 'term3', 'term4', 'term5', 'term6', 'term7', 'term8', 'term9', 'term10'];
}
