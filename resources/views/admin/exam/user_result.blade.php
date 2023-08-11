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
                   <th>#</th>
                   <th>Test</th>
                   <th>Total Question</th>
                   <th>Attempt Question</th>
                   <th>Correct Quesiton</th>
                   <th>Wrong Answer</th>
                   <th>Percentage</th>
                </tr>
              </thead>
              <tbody>
               @foreach($quizes as $quiz)
                <tr>
                  <td>#</td>
                  <td>{{$quiz->name}}</td>
                  <td>{{$total_questions}}</td>
                  <td>{{$results_count}}</td>
                  <td style="background-color:green;color:#fff;">{{$userCorrected}}</td>
                  <td style="background-color:red;color:#fff;">{{$user_wrong_answer}}</td>
                  <td style="background-color:#fb2;color:#fff;">{{round($percentage,2)}}</td>
                </tr>
               @endforeach
              </tbody>
            </table>
            <table class="table table-striped">
              <thead>
                <tr>
                   <th>Quesitons</th>
                   <th>Answer Given</th>
                   <th>Result</th>
                </tr>
              </thead>
              <tbody>
               @foreach($results as $key=>$result)
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$result->question->question}}</td>
                  <td>{{$result->answer->answer}}</td>
                  @if($result->answer->is_correct)
                    <td style="background:lightgreen;color:#fff;">Correct</td>
                  @else
                    <td style="background:red;color:#fff;">inCorrect</td>

                  @endif
                </tr>
               @endforeach
              </tbody>
            </table>
    		  </div>
    	  
    	</div>
    </div>
  </div>


<script type="text/javascript">
  
   
</script>

 @endsection
