@extends('layouts.app')


@section('content')

   
   <div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
               
               <form action="route('update.profile',$user->id)" method="post">
               	  <div class="form-group">
               	  	<label for="">Full Name:</label>
               	  	<input type="text" name="name" class="form-control" value="{{$user->name}}">
               	  </div>
               	  <div class="form-group">
               	  	<label for="">Email:</label>
               	  	<input type="text" name="email" class="form-control" value="{{$user->email}}">
               	  </div>
               	  <div class="form-group">
               	  	<label for="">Occupation:</label>
               	  	<input type="text" name="name" class="form-control" value="{{$user->name}}">
               	  </div>
               	  <div class="form-group">
               	  	<label for="">Phone:</label>
               	  	<input type="text" name="name" class="form-control" value="{{$user->name}}">
               	  </div>
               	  <div class="form-group">
               	  	<label for="">Address:</label>
               	  	<input type="text" name="name" class="form-control" value="{{$user->address}}">
               	  </div>
               	  <div class="form-group">
               	  	
               	  </div>
               	  <div class="form-group">
               	  	
               	  </div>
               	  <div class="form-group">
               	  	<input type="submit" name="submit" value="Save" class="btn btn-primary">
               	  </div>
               </form>

            </div>
        </div>
        <div class="col-md-4">
        	
        </div>
    </div>
</div>



@endsection