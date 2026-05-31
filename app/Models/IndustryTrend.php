<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndustryTrend extends Model
{
    protected $primaryKey = 'trend_id';

    public $timestamps = false;

    protected $fillable = [
        'skill_name',
        'category',
        'demand_level',
        'description',
    ];
}
