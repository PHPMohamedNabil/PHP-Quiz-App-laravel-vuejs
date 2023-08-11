<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\User;
use App\Http\Traits\AssignExamTrait;

class ExamController extends Controller
{
    use AssignExamTrait;

    public function index()
    {
    	return view('admin.exam.index',['quizes'=>Quiz::all()]);
    }
    public function create()
    {
    	return view('admin.exam.create',['quizes'=>Quiz::all(),'users'=>User::where('is_admin',0)->get()]);
    }

    public function store(Request $request)
    {
         $this->ValidateExam($request);
    	 $this->AssignUserExam($request->all());

    	 return back()->with('message','Quize Assinged Successfully');
    }

    public function removeExam(Request $request)
    {    
    	$this->ValidateExam($request);
    	
    	return $this->removeUserExam($request->all());
    }
  


    public function ValidateExam($request)
    {
    	 $request->validate(['user_id'=>'required|integer','quiz_id'=>'required|integer']);
    }

}
