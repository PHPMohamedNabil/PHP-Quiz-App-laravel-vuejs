<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index',['users'=>User::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validateUser($request);

         User::create([
            'name'=>$request->get('name'),
            'password'=>bcrypt($request->get('password')),
            'visible_password'=>$request->get('password'),
            'is_admin'=>0,
            'email'=>$request->get('email'),
            'address'=>$request->get('address'),
            'phone'=>$request->get('phone'),
            'occupation'=>$request->get('occupation')]);

         return back()->with('message','User Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.user.edit',['user'=>User::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validateUser($request,$id);
          
          if($request->get('password'))
          {
            User::where('id',$id)->update([
            'name'=>$request->get('name'),
            'password'=>bcrypt($request->get('password')),
            'visible_password'=>$request->get('password'),
            'email'=>$request->get('email'),
            'address'=>$request->get('address'),
            'phone'=>$request->get('phone'),
            'occupation'=>$request->get('occupation')]);
            return back()->with('message','User Created Successfully');
          }
          User::where('id',$id)->update([
            'name'=>$request->get('name'),
            'email'=>$request->get('email'),
            'address'=>$request->get('address'),
            'phone'=>$request->get('phone'),
            'occupation'=>$request->get('occupation')]);

         return back()->with('message','User Created Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id',$id);

        if($user->count() >0)
        {
            $user->delete();
            return back();
        }
        return back();
    }

    public function validateUser($request,$update_id=false)
    {
         if($update_id)
         {
            return $request->validate([
            'name'=>'required|min:2|max:30|string|unique:users,name,'.$update_id.',id',
            'email'=>'required|email|unique:users,email,'.$update_id.',id',
            'phone'=>'min:3',
            'address'=>'min:3',
            'occupation'=>'min:3'
         ]);

         }

         return $request->validate([
            'name'=>'required|min:2|max:30|string',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:3',
            'phone'=>'min:3',
            'address'=>'min:3',
            'occupation'=>'min:3'
         ]);
    }
}
