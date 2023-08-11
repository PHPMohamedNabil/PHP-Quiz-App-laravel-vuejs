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
    	  <form action="{{route('exam.store')}}" method="post">
    	  	 @csrf
    		<div class="module">
    		  <div class="module-head">
                <h3>Assign Quiz</h3>	
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

            <div class="controls">
              <label for="name" class="control-label">User</label>
              <select name="user_id" class="span8 @error('user_id') border-red @enderror">
                <option value="">--Select User To be Assigned to</option>
                 @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                 @endforeach
              </select>
                @error('user_id')
                           <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                    @enderror
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

