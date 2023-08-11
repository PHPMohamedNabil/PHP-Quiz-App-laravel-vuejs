@extends('admin.main.app')

  @section('title','Create Quiz')

 @section('content')

    <div class="span9">
    	<div class="content">
    		<div class="module">
    		  <div class="module-head">
                <h3>Questions</h3>	
    		  </div>
    		  <div class="module-body">
    		  	<table class="table table-striped">
              <thead>
                <tr>
                  <th>Question name</th>
                  <th>Quiz</th>
                  <th>Create Date</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
               @foreach($questions as $question)
                <tr>
                  <td>{{$question->question}}</td>
                  <td>{{$question->quiz->name}}</td>
                  <td>{{date('F d,Y',strtotime($question->created_at))}}</td>
                  <td>
                    <a href="{{route('question.edit',$question->id)}}" class="btn btn-primary" style="display:inline-block;">Edit</a>
                    <a href="{{route('question.show',$question->id)}}" class="btn btn-success" style="display:inline-block;">View</a>
                    <form action="{{route('question.destroy',$question->id)}}" method="post" style="display:inline-block;" onsubmit="return confirmDelete();">
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
     if(confirm('are you sure to delete this question ?'))
     {
         return true ;
     }
     return false;
   }
</script>

 @endsection
