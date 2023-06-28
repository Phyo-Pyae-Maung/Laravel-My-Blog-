<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User,Post};
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (isset($request->q)) {
            $users = User::query()
                ->where('name', 'LIKE', "%{$request->q}%")
                ->orWhere('email', 'LIKE', "%{$request->q}%")
                ->orWhere('phone', 'LIKE', "%{$request->q}%")
                ->orWhere('address', 'LIKE', "%{$request->q}%")
                ->orWhere('role', 'LIKE', "%{$request->q}%")
                ->paginate(10);
        } 
        else{
            $users = User::paginate(10);
        }
        return view('user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('user.create');
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
            'name'=> 'required',          
            'email'=> 'required',
            'phone'=> 'required',           
            'address'=> 'required',
            'role'=> 'required',
            'password'=> 'required'     
        ]);

        User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'address'=> $request->address,
            'role'=> $request->role,
            'password'=> Hash::make($request->password)
        ]);

        return redirect('admin/users')->with('msg','User Created Successfully');
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
        $roles = ['User','Author'];
       $user = User::find($id);
        return view('user.edit',compact('user','roles'));
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
        $request->validate([
            'name'=> 'required',          
            'email'=> 'required',
            'phone'=> 'required',           
            'address'=> 'required',
            'role'=> 'required'     
        ]);

        User::find($id)->update([
            'name'=> $request->name,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'address'=> $request->address,
            'role'=> $request->role
        ]);

        return redirect('admin/users')->with('msg','User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return back()->with('msg','User Deleted');
    }
}
