<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Package extends Model
{
    use HasFactory, Translatable;

    protected $table = 'packages';

    protected $fillable = ['type', 'price'];

    public $translatedAttributes = ['name'];

    public function features()
    {
        return $this->hasMany(PackageFeatures::class);
    }
}
