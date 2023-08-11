<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.quiz.index',['quizes'=>Quiz::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.quiz.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
        $this->validateQuiz($request);

        Quiz::create($request->all());
         
         return back()->with('message','quiz Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       // return view('admin.quiz.show',['quiz'=>Quiz::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.quiz.edit',['quiz'=>Quiz::find($id)]);
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
        return dd($request->all());
        
         $this->validateQuiz($request,$id);

         Quiz::where('id',$id)->update(array_slice($request->all(),2));

         return back()->with('message','Quiz Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $quiz = Quiz::where('id',$id );

        if( $quiz->count() > 0 )
        {
             $quiz->delete();

             return back();
        }

        return back();
    }

    public function validateQuiz($request,$update_id=0)
    {
        if($update_id)
        {
           return $request->validate([
                'name'=>'required|string|min:2|max:120|unique:quizzes,name,'.$update_id.',id',
                'description'=>'required|string|min:2|max:500',
                'minutes'=>'required|integer'
          ]); 
        }
        return $request->validate([
                'name'=>'required|string|min:2|max:120',
                'description'=>'required|string|min:2|max:500',
                'minutes'=>'required|integer'
          ]);

    }

    public function questions($id)
    {
        $q_question = Quiz::with('question')->where('id',$id)->get();

        return view('admin.quiz.question',['q_question'=>$q_question]);
    }
}
