<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialLinksTranslation extends Model
{
    use HasFactory;
    protected $table = 'social_links_translations';

    public $timestamps = true;

    protected $fillable = ['name', 'locale'];
}

