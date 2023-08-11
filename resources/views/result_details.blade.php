@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
       <div class="col-md-8">
       	<center><h2>Your Result</h2></center>
       	@foreach($result as $res)
       	 <div class="card">
       	 	<div class="card-header">
       	 		
       	 	</div>
       	 	<div class="card-body">
       	 		<p>
       	 			{{$res->question->question}}
       	 		</p>
       	 		@php
                   $i=1;

                   $answers= DB::table('answers')->where('question_id',$res->question_id)->get();
                   foreach($answers as $answer)
                   {
                      echo '<p>'.$i++.') '.htmlspecialchars($answer->answer).'<p>';
                   }

       	 		@endphp
       	 		<p>
       	 			<b>your Answer : {{$res->answer->answer}}</b>
       	 		</p>	
       	 		@php
                  $correctAnswer= DB::table('answers')->where('question_id',$res->question_id)->where('is_correct',1)->get();
                  foreach($correctAnswer as $correct):
                      echo '<div class="alert-success col-4">
                       	Correct Answer:'.htmlspecialchars($correct->answer)."</div>";
                  endforeach
       	 		@endphp
       	 		@if($res->answer->is_correct)
                   <span class="badge badge-success">
                   	Result:Correct
                   </span>
       	 		@else
                   <span class="badge badge-danger">
                   	Result:wrong
                   </span>
       	 		@endif
       	 	</div>
       	 </div>
       	 @endforeach
       </div>
    </div>
</div>


@endsection

