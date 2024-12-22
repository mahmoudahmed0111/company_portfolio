<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleTranslation extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = 'article_translations';

    protected $fillable = ['name', 'description'];
}
