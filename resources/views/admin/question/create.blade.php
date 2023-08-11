@extends('admin.main.app')

@section('title','Create Question')

 @section('content')

    <div class="span9">
    	<div class="content">
    		@if(session('message'))
              <div class="alert alert-success">
              	 {{session('message')}}
              </div>
    		@endif
    	  <form action="{{route('question.store')}}" method="post">
    	  	 @csrf
    		<div class="module">
    		  <div class="module-head">
                <h3>Create Question</h3>	
    		  </div>
    		  <div class="module-body">
    		  	<div class="control-group"></div>
            <div class="controls">
              <label for="name" class="control-label">Quiz</label>
              <select name="quiz_id" class="span8 @error('quiz_id') border-red @enderror">
                <option value="">--Select Quiz</option>
                 @foreach($quizes as $quiz)
                    <option value="{{$quiz->id}}">{{$quiz->name}}</option>
                 @endforeach
              </select>
                @error('quiz_id')
                           <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                    @enderror
            </div>
    		  	<label for="name" class="control-label">Question Name</label>
    		  	<div class="controls">
    		  		<input type="text" name="question" class="span8 @error('question') border-red @enderror" placeholder="name of a quiz" value="{{old('question')}}" />
    		  			@error('question')
                           <span class="invalid-feedback" role="alert">
                  	           <strong>{{ $message }}</strong>
                           </span>
    		  	        @enderror
    		  	</div>
            <div class="controls">
              <label for="options">options</label>
               @for($i=0; $i<4; $i++)
                 <input type="text" name="options[]" class="span7" placeholder="name of a options {{$i+1}}" value="@if(is_array( old('options') ) && count( old('options') )>0 ){{old('options')[$i]}} @endif" required="" />
              
                    <input type="radio" name="correct_answer" value="{{$i}}">
                    <span>is Correct Answer</span>
               @endfor
            </div>
    		  	<div class="controls">
                  <button type="submit" class="btn btn-success">Submit</button>
    		  	</div>
    		  
    		  </div>
    		</div>
    	  </form>
    	</div>
    </div>


 @endsection

