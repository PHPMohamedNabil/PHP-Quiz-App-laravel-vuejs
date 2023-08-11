<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Answer;
use App\Models\Quiz;


class Question extends Model
{
    //

    protected $guarded = [];

    public function answer()
    {
    	return $this->hasMany(Answer::class);
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}
