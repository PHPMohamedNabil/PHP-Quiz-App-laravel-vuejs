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
                    <form action="{{route('exam.delete')}}" method="post" style="display:inline-block;" onsubmit="return confirmDelete();">
                       <input type="hidden" name="user_id" value="{{$user->id}}">
                       <input type="hidden" name="quiz_id" value="{{$quiz->id}}">
                       @csrf
                       <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                    
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
