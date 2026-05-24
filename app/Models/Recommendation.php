<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    protected $fillable = [
        'role',
        'description',
        'min_score',
        'max_score',
        'bootcamp_name'
    ];
}
