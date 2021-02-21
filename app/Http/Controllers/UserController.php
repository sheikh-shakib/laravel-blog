<?php

namespace App\Http\Controllers;

use App\user;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::latest()->paginate(20);
        return view('admin.user.index', compact('users'));
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
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password'=>'required|min:8',
        ]);

        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'description'=>$request->description,
            'password'=>bcrypt($request->password),
        ]);
        if ($user) {
            return redirect()->route('user.index')->with('success','User Created Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password'=>'sometimes|nullable|min:8',
        ]);


            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=bcrypt($request->password);
            $user->save();

        if ($user) {
            return redirect()->route('user.index')->with('success','User Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success','User Deleted');
    }

    public function profile(){
        $user=auth()->user();
        return view('admin.user.profile', compact('user'));
    }

    public function profile_update(Request $request){
        $user=auth()->user();
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password'=>'sometimes|nullable|min:8',
            'image'=>'sometimes|nullable|image'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->image;
            $filename = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('/images'), $filename);
            $user->image=$filename;
            $user->image='images/'.$filename;
        }
        $user->name=$request->name;
        $user->email=$request->email;
        $user->description=$request->description;
        if ($request->has('password') && $request->password !== null) {
            $user->password=bcrypt($request->password);
        }
        $user->save();
        if ($user) {
            return redirect()->route('user.profile.update')->with('success','User Updated Successfully');
        }
        
    }
}
