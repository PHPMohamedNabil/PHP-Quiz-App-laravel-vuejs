@extends('admin.main.app')

  @section('title','Exam Assinged Users')

 @section('content')

    <div class="span9">
    	<div class="content">
    		<div class="module">
    		  <div class="module-head">
                <h3>Users Quiz</h3>	
    		  </div>
    		  <div class="module-body">
    		  	<table class="table table-striped">
              <thead>
                <tr>
                  <th>User Full Name</th>
                  <th>Quiz name</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
               @foreach($quizes as $quiz)
               @foreach($quiz->users as $user)
                <tr>
                  <td>{{$user->name}}</td>
                  <td>{{$quiz->name}}</td>
                  <td>
                  <a href="{{route('quiz.question',$quiz->id)}}" class="btn btn-inverse" style="display:inline-block;">View Question</a>
                  <a href="{{route('quiz_question_user',['quiz_id'=>$quiz->id,'user_id'=>$user->id])}}" class="btn btn-info" style="display:inline-block;">View Result</a> 
                    
                  </td>
                </tr>
               @endforeach
               @endforeach
              </tbody>
            </table>
    		  </div>
    	  
    	</div>
    </div>
  </div>


<script type="text/javascript">
  
   function confirmDelete()
   {
     if(confirm('are you sure to delete this quiz ?'))
     {
         return true ;
     }
     return false;
   }
</script>

 @endsection
