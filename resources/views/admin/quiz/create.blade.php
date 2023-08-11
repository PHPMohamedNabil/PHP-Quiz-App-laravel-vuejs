@extends('admin.main.app')

  @section('title','Create Quiz')

 @section('content')

    <div class="span9">
    	<div class="content">
    		@if(session('message'))
              <div class="alert alert-success">
              	 {{session('message')}}
              </div>
    		@endif
    	  <form action="{{route('quiz.store')}}" method="post">
    	  	 @csrf
    		<div class="module">
    		  <div class="module-head">
                <h3>Create Quiz</h3>	
    		  </div>
    		  <div class="module-body">
    		  	<div class="control-group"></div>
    		  	<label for="name" class="control-label">Quiz Name</label>
    		  	<div class="controls">
    		  		<input type="text" name="name" class="span8 @error('name') border-red @enderror" placeholder="name of a quiz" value="{{old('name')}}" />
    		  			@error('name')
                           <span class="invalid-feedback" role="alert">
                  	           <strong>{{ $message }}</strong>
                           </span>
    		  	        @enderror
    		  	</div>

    		  	<div class="controls">
    		  		<label for="name" class="control-label">Quiz Description</label>
    		  		<textarea name="description" class="span8 @error('description') border-red @enderror" placeholder="description of a quiz">{{old('description')}}</textarea>
    		  			@error('description')
                           <span class="invalid-feedback" role="alert">
                  	           <strong>{{ $message }}</strong>
                           </span>
    		  	        @enderror
    		  	</div>
    		  	<div class="controls">
    		  		<label for="name" class="control-label">Quiz Minutes</label>
    		  		<input type="number" name="minutes" class="span8 @error('minutes') border-red @enderror" placeholder="name of a quiz" value="{{old('minutes')}}" min="1" />
    		  			@error('minutes')
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

