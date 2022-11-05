<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Session;

// Pakai Mail Controller
use App\Http\Controllers\MailController;

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

    public function lupa_kata_sandi(){
        if(Auth::check()){
            return redirect('dashboard');
        }else{
            return view('dashboard.forgotpass');
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

    public function store_forgot_password(Request $request){
        $request->validate([
            'email' => 'required|exists:users_bersiis'
        ]);
        $mail = $request->email;
        // Buat token login
        $rnd = rand(100000,1000000);
        User::where('email', $mail)->update([
            'forgot_token' => $rnd
        ]);
        // Ambil nama
        $sch_name = DB::table('users_bersiis')
        ->select('name')
        ->where('email', '=', $mail)->first();
        // Kirim
        $snd = MailController::index($sch_name->name, $mail, $rnd);
        if($snd == true){
            return 'Berhasil';
        }
    }
}
