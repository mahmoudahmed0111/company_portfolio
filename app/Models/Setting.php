<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory, Translatable;

    protected $table = 'settings';

    protected $fillable = ['email', 'phone1', 'phone2', 'logo'];

    public $translatedAttributes = ['name', 'description', 'address'];
}
