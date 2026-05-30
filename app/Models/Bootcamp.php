<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bootcamp extends Model
{
    protected $primaryKey = 'bootcamp_id';

    public $timestamps = false;

    protected $fillable = [
        'track_id',
        'name',
        'url',
        'description',
    ];

    public function careerTrack()
    {
        return $this->belongsTo(CareerTrack::class, 'track_id', 'track_id');
    }
}