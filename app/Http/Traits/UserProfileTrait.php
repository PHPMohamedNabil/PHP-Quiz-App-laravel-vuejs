<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;
use App\Models\User;

trait UserProfileTrait{


     
     public function profileData($user_id)
     {
     	if($user_id === auth()->user()->id && auth()->user()->id)
     	{
             return view('profile',['user'=>User::find( auth()->user()->id )]);
     	}

     	return redirect('/');

     }


}