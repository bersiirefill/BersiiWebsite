<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Wallet;
use Session;
use Illuminate\Support\Facades\View;

// Pakai Mail Controller
use App\Http\Controllers\MailController;

class LoginController extends Controller
{
    //
    public function login(){
        if(Auth::check()){
            return redirect('dashboard');
        }else{
            return view('dashboard.login.login');
        }
    }

    public function signup(){
        if(Auth::check()){
            return redirect('dashboard');
        }else{
            return view('dashboard.login.signup');
        }
    }

    public function lupa_kata_sandi(){
        if(Auth::check()){
            return redirect('dashboard');
        }else{
            return view('dashboard.login.forgotpass');
        }
    }

    // public function verifikasi_kode(Request $request){
    //     if(Auth::check()){
    //         return redirect('dashboard');
    //     }else{
    //         return View::make('dashboard.emailverif')->with('email', $request->email);
    //     }
    // }

    // public function login_action(Request $request){
    //     $data = [
    //         'email' => $request->Email,
    //         'password' => $request->Password,
    //     ];
    //     if(Auth::Attempt($data)){
    //         return redirect('dashboard');
    //     }else{
    //         Session::flash('error', 'Email/Password salah !');
    //         return redirect('login');
    //     }
    // }

    public function logout_action(){
        Session::flush();
        Auth::logout();
        Session::flash('success', 'Berhasil logout !');
        return redirect('login');
    }

    public function store_signup(Request $request){
        $request->validate([
            'nama' => 'required|min:5|unique:users_bersiis',
            'email' =>'required|min:5|email|unique:users_bersiis',
            'nomor_telepon' =>'required|min:5|unique:users_bersiis',
            'alamat' =>'required|min:5',
            'password' =>'required|min:5',
        ]);
        $data = $request->all();
        $rnd = rand(100000,1000000);
        $create = User::create([
            'id' => 'BRS-'.$rnd.'',
            'nama' => $data['nama'],
            'email' => $data['email'],
            'nomor_telepon' => $data['nomor_telepon'],
            'alamat' => $data['alamat'],
            'password' => Hash::make($data['password']),
        ]);
        $create = Wallet::create([
            'id' => 'BRS-'.$rnd.'',
            'saldo' => 0
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
        ->select('nama')
        ->where('email', '=', $mail)->first();
        // Kirim
        $snd = MailController::index($sch_name->name, $mail, $rnd);
        if($snd == true){
            return redirect()->route('verifikasi_kode', ['email' => $request->email]);
        }
    }

    public function login_action_forgot(Request $request){
        $data = DB::table('users_bersiis')
        ->where('email', '=', $request->email)
        ->where('forgot_token', '=', $request->kode_verifikasi)
        ->first();
        if(Auth::loginUsingId($data->id)){
            User::where('email', $request->email)->update([
                'forgot_token' => NULL,
            ]);
            Session::flash('success', 'Harap segera melakukan perubahan kata sandi Anda !');
            return redirect('dashboard');
        }else{
            Session::flash('error', 'Kode verifikasi salah/tidak berlaku !');
            return redirect()->route('verifikasi_kode', ['email' => $request->email]);
        }
    }
}
