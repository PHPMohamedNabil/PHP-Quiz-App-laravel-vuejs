@extends('layouts.app')

@section('content')
  
  <quiz-component 
      :time="{{$quiz->minutes}}"
      :quiz-id="{{$quiz->id}}" 
      :quiz-question="{{$questions}}"             
      :is-Played="{{count($quiz->result)}}">

  </quiz-component>

@endsection
