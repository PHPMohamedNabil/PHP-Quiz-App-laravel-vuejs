<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Quiz;

class Result extends Model
{
    //

    protected $guarded = [];

    public function question()
    {
    	return $this->belongsTo(Question::class);
    }

    public function answer()
    {
    	return $this->belongsTo(Answer::class);
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}
