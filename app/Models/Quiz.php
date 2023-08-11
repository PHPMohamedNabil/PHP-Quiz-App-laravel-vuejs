<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Question;
use App\Models\User;
use App\Models\Result;

class Quiz extends Model
{

    protected $guarded = [];


    public function question()
    {
    	return $this->hasMany(Question::class);
    }

    public function users()
    {   
    	return $this->belongsToMany(User::class,'quize_user');
    }

    public function result()
    {
        return $this->hasMany(Result::class,'quize_id');
    }

    public function scopeAssingedQuizes($query,$user_id,$quize_id)
    {
        return $query->join('quize_user', function ($join) use ($user_id,$quize_id) {
            
         $join->on('quize_user.quiz_id', '=', 'quizzes.id')->where('quize_user.user_id', '=', $user_id)->where('quize_user.quiz_id', '=', $quize_id);
        });
    }
}
