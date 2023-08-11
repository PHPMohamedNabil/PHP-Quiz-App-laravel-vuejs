@extends('admin.main.app')

  @section('title','Create Quiz')

 @section('content')

    <div class="span9">
    	<div class="content">
    		@foreach($q_question as $quiz)
    		<div class="module">
    			<div class="module-head">
    				<h3>{{$quiz->name}}</h3>
    			</div>
    			<div class="module-body">
    				<p><h3 class="heading"></h3></p>
    				<div class="module-body table">
    					@foreach($quiz->question as $question)
    					<table>
    					 <tbody>
    						<tr class="read">
    							{{$question->question}}
    							<td class="cell-author hidden-phone hidden-tablet">
    							 @foreach($question->answer as $answer)
    								<p>
									  {{$answer->answer}}
									  @if($answer->is_correct)
									   <span class="badge badge-success">
									   	Correct Answer
									   </span>
									  @endif
    								</p>
    							 @endforeach
    							</td>
    						</tr>
    					 </tbody>
    					</table>
    					@endforeach
    				</div>
    			</div>
    			<div class="module-footer">
    				<td>
    					<a href="{{route('quiz.index')}}" class="btn btn-inverse pull-center">Back</a>
    				</td>
    			</div>
    		</div>
    		@endforeach
        </div>
    </div>

 @endsection
