<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageTranslation extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = 'package_translations';

    protected $fillable = ['name'];
}
