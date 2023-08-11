@extends('admin.main.app')

@section('title','Question | '.$question->question)

 @section('content')

    <div class="span9">
    	<div class="content">
    		@if(session('message'))
              <div class="alert alert-success">
              	 {{session('message')}}
              </div>
    		@endif
    	  
    		<div class="module">
    		  <div class="module-head">
                <h3>{{$question->question}} </h3>	
    		  </div>
    		  <div class="module-body">
    		  	
            @foreach($question->answer as $answer)
                
                <div class="controls">
                   {{$answer->answer}} 
                  @if($answer->is_correct)
                      <span class="badge badge-success pull-right">Correct</span>
                  @endif
                </div>
            
            @endforeach
            <div class="controls" style="margin-top:15px;">
              <a href="{{route('question.edit',$question->id)}}" class="btn btn-primary" style="display:inline-block;">Edit</a>
                    <form action="{{route('question.destroy',$question->id)}}" method="post" style="display:inline-block;" onsubmit="return confirmDelete();">
                       {{method_field('DELETE')}}
                       @csrf
                       <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
            </div>
            
    		  
    		  </div>
    		</div>
    	
    	</div>
    </div>

<script type="text/javascript">
  
   function confirmDelete()
   {
     if(confirm('are you sure to delete this question ?'))
     {
         return true ;
     }
     return false;
   }
</script>

 @endsection

