<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    protected $primaryKey = 'assessment_id';

    protected $fillable = [
        'title',
        'description',
        'major',
    ];

    public function questions()
    {
        return $this->hasMany(Question::class, 'assessment_id', 'assessment_id')
                    ->orderBy('order_number');
    }

    public function sessions()
    {
        return $this->hasMany(AssessmentSession::class, 'assessment_id', 'assessment_id');
    }
}