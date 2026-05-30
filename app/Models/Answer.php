<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $primaryKey = 'answer_id';
    const UPDATED_AT = null;
    public $timestamps = false;

    protected $fillable = [
        'session_id',
        'question_id',
        'option_id',
    ];

    public function session()
    {
        return $this-> belongsTo(AssessmentSession::class, 'session_id', 'session_id');
    }

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id', 'question_id');
    }

    public function option()
    {
    return $this->belongsTo(Option::class, 'option_id', 'option_id');
    }
}
