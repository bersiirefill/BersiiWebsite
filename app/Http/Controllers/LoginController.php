<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Session;

class LoginController extends Controller
{
    //
    public function login(){
        if(Auth::check()){
            return redirect('dashboard');
        }else{
            return view('dashboard.login');
        }
    }

    public function signup(){
        if(Auth::check()){
            return redirect('dashboard');
        }else{
            return view('dashboard.signup');
        }
    }

    public function login_action(Request $request){
        $data = [
            'email' => $request->Email,
            'password' => $request->Password,
        ];
        if(Auth::Attempt($data)){
            return redirect('dashboard');
        }else{
            Session::flash('error', 'Email/Password salah !');
            return redirect('login');
        }
    }

    public function logout_action(){
        Session::flush();
        Auth::logout();
        Session::flash('success', 'Berhasil logout !');
        return redirect('login');
    }

    public function store_signup(Request $request){
        $request->validate([
            'name' => 'required|min:5|unique:users_bersiis',
            'email' =>'required|min:5|email|unique:users_bersiis',
            'number' =>'required|min:5|unique:users_bersiis',
            'address' =>'required|min:5',
            'password' =>'required|min:5',
        ]);
        $data = $request->all();
        $create = User::create([
            'id' => 'BRS-'.rand(100000,1000000).'',
            'name' => $data['name'],
            'email' => $data['email'],
            'number' => $data['number'],
            'address' => $data['address'],
            'password' => Hash::make($data['password']),
        ]);
        if($create){
            Session::flash('success', 'Berhasil mendaftar !');
            return redirect('daftar');
        }else{
            Session::flash('error', 'Pendaftaran gagal !');
            return redirect('daftar');
        }
    }
}
