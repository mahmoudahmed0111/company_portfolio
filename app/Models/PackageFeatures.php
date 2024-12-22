<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PackageFeatures extends Model
{
    use HasFactory, Translatable;

    protected $table = 'package_features';

    protected $fillable = ['package_id'];

    public $translatedAttributes = ['feature'];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
