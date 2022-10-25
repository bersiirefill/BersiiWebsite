<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    //
    public function login(){
        // Baru diaktifkan setelah dashboard jadi
        // if(Auth::check()){
        //     return redirect('home');
        // }else{
        //     return view('dashboard.login');
        // }
        return view('dashboard.login');
    }

    public function signup(){
        // Baru diaktifkan setelah dashboard jadi
        // if(Auth::check()){
        //     return redirect('home');
        // }else{
        //     return view('dashboard.signup');
        // }
        return view('dashboard.signup');
    }

    public function store_signup(Request $request){
        $request->validate([
            'name' => 'required|min:5|unique:name',
            'email' =>'required|min:5|unique:email',
            'number' =>'required|min:5|unique:number',
            'address' =>'required|min:5',
            'password' =>'required|min:5',
        ]);
        $data = $request->all();
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'number' => $data['number'],
            'address' => $data['number'],
            'password' => Hash::make($data['password']),
        ]);
        return redirect('signup')->with('success', 'Sign Up Success');
    }
}
