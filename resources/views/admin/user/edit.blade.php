@extends('admin.main.app')

  @section('title','Edit user'.$user->name)

 @section('content')

    <div class="span9">
    	<div class="content">
    		@if(session('message'))
              <div class="alert alert-success">
              	 {{session('message')}}
              </div>
    		@endif
    	  <form action="{{route('user.update',$user->id)}}" method="post">
    	  	 @csrf
           {{method_field('PUT')}}
    		<div class="module">
    		  <div class="module-head">
                <h3>Create Quiz</h3>	
    		  </div>
    		  <div class="module-body">
    		  	<div class="control-group"></div>
    		  	<div class="controls">
                <label for="name" class="control-label">Full Name</label>
    		  		<input type="text" name="name" class="span8 @error('name') border-red @enderror" placeholder="name of a user" value="{{$user->name}}" />
    		  			@error('name')
                           <span class="invalid-feedback" role="alert">
                  	           <strong>{{ $message }}</strong>
                           </span>
    		  	        @enderror
    		  	</div>
            <div class="controls">
                <label for="name" class="control-label">Email</label>
              <input type="text" name="email" class="span8 @error('email') border-red @enderror" placeholder="email" value="{{$user->email}}" />
                @error('email')
                           <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                    @enderror
            </div>
            <div class="controls">
                <label for="name" class="control-label">Password</label>
              <input type="text" name="password" class="span8 @error('password') border-red @enderror" placeholder="password of a user" value="{{$user->visible_password}}" />
                @error('password')
                           <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                    @enderror
            </div>
            <div class="controls">
                <label for="name" class="control-label">Occupation</label>
              <input type="text" name="occupation" class="span8 @error('password') border-red @enderror" placeholder="occupation of a user" value="{{$user->occupation}}" />
                @error('occupation')
                           <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                @enderror
            </div>
            <div class="controls">
              <label for="name" class="control-label">Address</label>
              <input type="text" name="address" class="span8 @error('address') border-red @enderror" placeholder="Address of a user" value="{{$user->address}}" />
                @error('address')
                           <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                @enderror
            </div>
            <div class="controls">
              <label for="name" class="control-label">Phone</label>
              <input type="text" name="phone" class="span8 @error('phone') border-red @enderror" placeholder="Phone of a user" value="{{$user->phone}}" />
                @error('phone')
                           <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                @enderror
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

