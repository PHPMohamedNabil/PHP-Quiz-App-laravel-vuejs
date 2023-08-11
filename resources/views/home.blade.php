@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Quizzes</div>
             
                    @if (session('message'))
                        <div class="alert alert-warning" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif  
            @foreach($users->quizes as $quiz)
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif                      
                   
                       <h2>{{$quiz->name}}</h2>
                       <p>Description:{{$quiz->description}}</p>
                       <p>Time Allocated:{{$quiz->minutes}} mintues</p>
                       <p>Pace:{{count($quiz->result)}}/{{count($quiz->question)}}
                        <progress value="{{count($quiz->result)}}" max="{{count($quiz->question)}}">
                        </progress>
                        </p>
                       @if(count($quiz->result) > 0 && count($quiz->result) < count($quiz->question) )
                              <a href="{{route('quiz_question',$quiz->id)}}" class="btn btn-primary">Continue</a>
                       @elseif(count($quiz->result) == count($quiz->question) )
                             <a  href="{{route('result',['user_id'=>auth()->user()->id,'quiz_id'=>$quiz->id])}}" class="float-left">Completed</a>
                       @else
                             <a  href="{{route('quiz_question',$quiz->id)}}" class="btn btn-success">Start Quiz</a>

                       @endif
                    </div>
  
                 @endforeach
                
            </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-header">
              User Profile
            </div>
            <div class="card-body">
              <p>Email: {{auth()->user()->email}}</p>
              <p>Occupation: {{auth()->user()->occupation}}</p>
              <p>Address: {{auth()->user()->address}}</p>
              <p>Phone: {{auth()->user()->phone}}</p>

            </div>
          </div>
        </div>
    </div>
</div>
@endsection
