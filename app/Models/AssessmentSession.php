<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssessmentSession extends Model
{
    protected $primaryKey = 'session_id';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'assessment_id',
        'session_status',
        'progress_percentage',
        'ended_at',
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'ended_at'   => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function assessment()
    {
        return $this->belongsTo(Assessment::class, 'assessment_id', 'assessment_id');
    }

    public function answers()
    {
        return $this->hasMany(Answer::class, 'session_id', 'session_id');
    }

    public function result()
    {
        return $this->hasOne(AssessmentResult::class, 'session_id', 'session_id');
    }
}