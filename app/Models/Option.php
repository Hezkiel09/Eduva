<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $primaryKey = 'option_id';

    public $timestamps = false;

    protected $fillable = [
        'question_id',
        'option_text',
        'scores',
    ];

    // INI KUNCI SCORING — scores JSON otomatis jadi array PHP
    protected $casts = [
        'scores' => 'array',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id', 'question_id');
    }
}