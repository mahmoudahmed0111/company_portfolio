<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTranslation extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = 'project_translations';

    protected $fillable = ['name', 'description'];
}
