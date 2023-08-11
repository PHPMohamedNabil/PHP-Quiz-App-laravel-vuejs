<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Answer;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.question.index',['questions'=>Question::latest()->with('quiz')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.question.create',['quizes'=>Quiz::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
       $this->validateQuestion($request);

      $question = Question::create([
                'question'=>$request->get('question'),
                'quiz_id'=> $request->get('quiz_id')
              ]);

       $this->Answers($request,$question->id);

       return back()->with('message','Question Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.question.show',['question'=>Question::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      return view('admin.question.edit',['question'=>Question::find($id),'quizes'=>Quiz::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validateQuestion($request,$id);

       Question::where('id',$id)->update([
                'question'=>$request->get('question'),
                'quiz_id'=> $request->get('quiz_id')
              ]);

        $this->Answers($request,$id,true);

       return back()->with('message','Question Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {    
        $question = Question::where('id',$id );

        if( $question->count() > 0 )
        {
             $question->delete();
             Answer::where('question_id',$id)->delete();
             return back();
        }

        return back();
    }

    public function validateQuestion($request,$update_id=0)
    {
        if($update_id)
        {
           return $request->validate([
                'quiz_id'=>'required',
                'question'=>'required|min:3|unique:questions,question,'.$update_id.',id',
                'options'=>'bail|required|array|min:3',
                'options.*'=>'bail|required|string|distinct',
                'correct_answer'=>'required'
          ]); 
        }

           return $request->validate([
                'quiz_id'=>'required',
                'question'=>'required|min:3',
                'options'=>'bail|required|array|min:3',
                'options.*'=>'bail|required|string|distinct',
                'correct_answer'=>'required'
          ]);

    }

    public function Answers($request,$q_id,$update=false)
    {
        if($update)
        {
            Answer::where('question_id',$q_id)->delete();
        }
         foreach ($request->get('options') as $key => $value)
         {
            $is_correct = false;
            if($key == $request->get('correct_answer'))
            {
                 $is_correct=true;
            }
            Answer::create([

               'question_id'=>$q_id,
               'answer'     =>$value,
               'is_correct' =>$is_correct

            ]);
         }

             

    }

}
