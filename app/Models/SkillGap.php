<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkillGap extends Model
{
    protected $primaryKey = 'skill_gap_id';

    public $timestamps = false;

    protected $fillable = [
        'result_id',
        'skill_name',
        'gap_level',
    ];

    public function result()
    {
        return $this->belongsTo(AssessmentResult::class, 'result_id', 'result_id');
    }
}