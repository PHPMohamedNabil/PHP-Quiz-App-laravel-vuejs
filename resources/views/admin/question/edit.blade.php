@extends('admin.main.app')

@section('title','Create Question')

 @section('content')

    <div class="span9">
      <div class="content">
        @if(session('message'))
              <div class="alert alert-success">
                 {{session('message')}}
              </div>
        @endif
        <form action="{{route('question.update',$question->id)}}" method="post">
           @csrf
           {{method_field('PUT')}}
        <div class="module">
          <div class="module-head">
                <h3>Create Question</h3>  
          </div>
          <div class="module-body">
            <div class="control-group"></div>
            <div class="controls">
              <label for="name" class="control-label">Quiz</label>
              <select name="quiz_id" class="span8 @error('quiz_id') border-red @enderror">
                 @foreach($quizes as $quiz)
                    @if($quiz->id == $question->quiz_id)
                    <option value="{{$quiz->id}}" selected="">{{$quiz->name}}</option>
                    @else
                    <option value="{{$quiz->id}}">{{$quiz->name}}</option>
                    @endif
                 @endforeach
              </select>
                @error('quiz_id')
                           <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                    @enderror
            </div>
            <label for="name" class="control-label">Question Name</label>
            <div class="controls">
              <input type="text" name="question" class="span8 @error('question') border-red @enderror" placeholder="name of a quiz" value="{{$question->question}}" />
                @error('question')
                           <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                    @enderror
            </div>
            <div class="controls">
              <label for="options">options</label>
               @foreach($question->answer as $key=>$answer)
                 <input type="text" name="options[]" class="span7" required="" value="{{$answer->answer}}" />
              
                    @if($answer->is_correct)
                        <input type="radio" name="correct_answer" value="{{$key}}" checked="">
                    <span>is Correct Answer</span>
                    @else

                     <input type="radio" name="correct_answer" value="{{$key}}">
                    <span>is Correct Answer</span>
                    @endif
               @endforeach
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

