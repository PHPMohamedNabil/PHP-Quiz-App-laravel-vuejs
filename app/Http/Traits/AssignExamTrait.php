<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Result;
use App\Models\Answer;
use App\Models\Question;

trait AssignExamTrait{

    

    public function AssignUserExam($data)
    {  
    	$quiz = Quiz::find($data['quiz_id']);
        $user_id = $data['user_id'];
         
         return $quiz->users()->syncWithoutDetaching($user_id);
    }

    public function removeUserExam($data)
    {
    	$quiz   = Quiz::find($data['quiz_id']);
    	$result = Result::where([
    		                     'quize_id'=>$data['quiz_id'],
    		                     'user_id'=>$data['user_id']
    		                     ])->exists();
    	if($result)
    	{
            return back()->with('message','this quiz is started by user and can not be deleted');
    	}
    	else
    	{   
    		$quiz->users()->detach($data['user_id']);
           return back()->with('message','user deleted successfuly');
    	}
    }

    public function getQuizQuestion($quize_id)
    {
       $user_id   = auth()->user()->id; 
       $quiz      = Quiz::AssingedQuizes($user_id,$quize_id)->exists();

        if($quiz)
        {
       	   $quiz      = Quiz::find($quize_id);

       	   $questions = Question::where('quiz_id',$quize_id)->with('answer')->get();

       	   if(count($quiz->result) >=count($questions))
       	   {
       	   	   return redirect('/')->with('message','you are completed this exam');
       	   }


       	    return view('quiz',['quiz'=>$quiz,'questions'=>$questions]);
        }	

            return redirect('/');

    }

    public function postQuiz(Request $request)
    {   
    	$request->validate(['question_id'=>'required|integer',
    		                'answer_id'=>'required|integer',
    		                'quiz_id'=>'required|integer'
    		               ]
    		             );

    	$question_id = $request->get('question_id');
    	$answer_id   = $request->get('answer_id');
    	$quiz_id     = $request->get('quiz_id');
    	$user_id     = auth()->user()->id;

    	return $ueser_question_answer=Result::updateOrCreate(
             [
               'user_id'=>$user_id,
               'quize_id'=>$quiz_id,
               'question_id'=>$question_id
             ]
    	,['quize_id'=>$quiz_id,'question_id'=>$question_id,'answer_id'=>$answer_id]);

    }

    public function viewResult($user_id,$quiz_id)
    { 
        $result = Result::where('user_id',$user_id)->where('quize_id',$quiz_id)->get();

    	return view('result_details',compact('result'));

    }

    public function viewUserResult()
    {

    	   return view('admin.exam.result',['quizes'=>Quiz::all()]);
    }

    public function userQuizes($quiz_id,$user_id)
    {
    	$results =Result::where('user_id',$user_id)->where('quize_id',$quiz_id)->get();

    	$total_questions =Question::where('quiz_id',$quiz_id)->count();
    	$results_count =Result::where('user_id',$user_id)->where('quize_id',$quiz_id)->count();
    	$quizes = Quiz::where('id',$quiz_id)->get();

    	$answers=[];

    	foreach ($results as $answer)
    	{
    		array_push($answers,$answer->answer_id);
    	}


    	$userCorrected=Answer::whereIn('id',$answers)->where('is_correct',1)->count();

    	

    	$user_wrong_answer=$total_questions-$userCorrected;

    	$percentage=($userCorrected/$total_questions)*100;

    	  return view('admin.exam.user_result',compact('results','total_questions','results_count','userCorrected','percentage','user_wrong_answer','quizes')); 

    }



}
