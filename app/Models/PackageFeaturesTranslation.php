<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageFeaturesTranslation extends Model
{

    protected $fillable = ['package_features_id', 'locale', 'feature'];


    public function packageFeature()
    {
        return $this->belongsTo(PackageFeatures::class);
    }
}
