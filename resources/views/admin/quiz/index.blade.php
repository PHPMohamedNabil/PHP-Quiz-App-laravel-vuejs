@extends('admin.main.app')

  @section('title','Create Quiz')

 @section('content')

    <div class="span9">
    	<div class="content">
    		<div class="module">
    		  <div class="module-head">
                <h3>Create Quiz</h3>	
    		  </div>
    		  <div class="module-body">
    		  	<table class="table table-striped">
              <thead>
                <tr>
                  <th>Quiz name</th>
                  <th>Quiz Description</th>
                  <th>Quiz Minutes</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
               @foreach($quizes as $quiz)
                <tr>
                  <td>{{$quiz->name}}</td>
                  <td>{{$quiz->description}}</td>
                  <td>{{$quiz->minutes}} m</td>
                  <td>
                    <a href="{{route('quiz.question',$quiz->id)}}" class="btn btn-inverse" style="display:inline-block;">View Question</a>
                    <a href="{{route('quiz.edit',$quiz->id)}}" class="btn btn-primary" style="display:inline-block;">Edit</a>
                    <form action="{{route('quiz.destroy',$quiz->id)}}" method="post" style="display:inline-block;" onsubmit="return confirmDelete();">
                       {{method_field('DELETE')}}
                       @csrf
                       <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                    
                  </td>
                </tr>
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
