<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssessmentResult extends Model
{
    protected $primaryKey = 'result_id';

    public $timestamps = false;

    protected $fillable = [
        'session_id',
        'user_id',
        'track_id',
        'track_scores',
        'top_track',
        'readiness_level',
    ];

    protected $casts = [
        'track_scores' => 'array',
        'submitted_at' => 'datetime',
    ];

    public function session()
    {
        return $this->belongsTo(AssessmentSession::class, 'session_id', 'session_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function careerTrack()
    {
        return $this->belongsTo(CareerTrack::class, 'track_id', 'track_id');
    }

    public function skillGaps()
    {
        return $this->hasMany(SkillGap::class, 'result_id', 'result_id');
    }
}