<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerTrack extends Model
{
    protected $primaryKey = 'track_id';

    protected $fillable = [
        'slug',
        'title',
        'description',
        'roadmap',
    ];

    protected $casts = [
        'roadmap' => 'array',
    ];

    public function bootcamps()
    {
        return $this->hasMany(Bootcamp::class, 'track_id', 'track_id');
    }

    public function results()
    {
        return $this->hasMany(AssessmentResult::class, 'track_id', 'track_id');
    }
}