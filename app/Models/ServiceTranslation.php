<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceTranslation extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = 'service_translations';

    protected $fillable = ['name', 'description'];
}
