<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Wallet;

class MobileApiController extends Controller
{
    //
    public function login_mobile(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Data pengguna tidak ditemukan'],
            ]);
        }
        $token = $user->createToken($request->email)->plainTextToken;
        $wallet = $user->wallet()->first(['wallet.saldo']);
        header("HTTP/ 200");
        header('Content-Type: application/json');
        $array[] = array(
            'status' => 1,
            'message' => 'Sukses',
            'id' => $user->id,
            'nama' => $user->nama,
            'email' => $user->email,
            'nomor_telepon' => $user->nomor_telepon,
            'alamat' => $user->alamat,
            'saldo' => $wallet->saldo,
            'token' => $token
        );
        echo json_encode($array);
    }

    public function register_mobile(Request $request){
        $request->validate([
            'nama' =>'required',
            'email' =>'required|email|unique:users_bersiis',
            'password' =>'required',
        ]);
        $data = $request->all();
        $rand1 = rand(100000,1000000);
        $create = User::create([
            'id' => $rand1,
            'nama' => $data['nama'],
            'email' => $data['email'],
            'nomor_telepon' => NULL,
            'alamat' => NULL,
            'password' => Hash::make($data['password']),
        ]);
        $create2 = Wallet::create([
            'id' => $rand1,
            'saldo' => 10000,
        ]);
        if($create && $create2){
            header("HTTP/ 200");
            header('Content-Type: application/json');
            $array[] = array(
                'status' => 1,
                'message' => 'Sukses',
            );
            echo json_encode($array);
        }else{
            header("HTTP/ 500");
            header('Content-Type: application/json');
            $array[] = array(
                'status' => 0,
                'message' => 'Gagal',
            );
            echo json_encode($array);
        }
    }

    public function logout_mobile(Request $request){
        // $station = Station::where('nomor_seri', $request->nomor_seri)->first();
        $del = DB::table('personal_access_tokens')
        ->where('id', '=', $request->token)
        ->delete();
        // $del = $station->tokens()->where('id', $request->token_id)->delete();
        if($del){
            header("HTTP/ 200");
            header('Content-Type: application/json');
            $array[] = array(
                'status' => 1,
                'message' => 'Token Dicabut',
            );
            echo json_encode($array);
        }else{
            header("HTTP/ 500");
            header('Content-Type: application/json');
            $array[] = array(
                'status' => 0,
                'message' => 'Token Gagal Dicabut',
            );
            echo json_encode($array);
        }
    }

    public function forgot_mobile(Request $request){
        $rand1 = rand(100000,1000000);
        User::where('email', $request->email)->update([
            'forgot_token' => $rand1,
        ]);
        // Ambil nama
        $sch_name = DB::table('users_bersiis')
        ->select('nama', 'email')
        ->where('email', '=', $request->email)->first();
        // Kirim
        $snd = MailController::index($sch_name->nama, $sch_name->email, $rand1);
        if($snd == true){
            header("HTTP/ 200");
            header('Content-Type: application/json');
            $array[] = array(
                'status' => 1,
                'message' => 'Email Dikirim',
            );
            echo json_encode($array);
        }else{
            header("HTTP/ 500");
            header('Content-Type: application/json');
            $array[] = array(
                'status' => 0,
                'message' => 'Email Gagal Dikirim',
            );
            echo json_encode($array);
        }
    }
}
