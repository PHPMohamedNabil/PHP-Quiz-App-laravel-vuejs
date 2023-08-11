@extends('admin.main.app')

  @section('title','Users')

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
                  <th>Full name</th>
                  <th>Email</th>
                  <th style="">VisiblePassword</th>
                  <th>Address</th>
                  <th>Phone</th>
                  <th>Occupation</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
               @foreach($users as $user)
                <tr>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->visible_password}} </td>
                  <td>{{$user->address}} </td>
                  <td>{{$user->phone}} </td>
                  <td>{{$user->occupation}} </td>
                  <td>
                    <a href="{{route('user.edit',$user->id)}}" class="btn btn-primary" style="display:inline-block;">Edit</a>
                    <form action="{{route('user.destroy',$user->id)}}" method="post" style="display:inline-block;" onsubmit="return confirmDelete();">
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
     if(confirm('are you sure to delete this user ?'))
     {
         return true ;
     }
     return false;
   }
</script>

 @endsection
