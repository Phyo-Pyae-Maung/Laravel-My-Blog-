<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
         $request->validate([
            'email'=> 'required',
            'password' => 'required',
            
        ]); 

        if(Auth::attempt([
            
           'email'=> $request->email, 
           'password'=> $request->password,
           'role' => 'Author'
           ]))
        {
            return redirect('/admin');
        }

        
        if(Auth::attempt([
            
            'email'=> $request->email, 
            'password'=> $request->password,
            'role' => 'User'
            ]))
         {
             return redirect('/home');
         }

        return back()->with('msg', 'Login Failed');
    }

    public function logOut()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function register()
    {
        return view('auth.create');
    }

    public function userRegister(Request $request)
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
}
