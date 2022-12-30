<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
            'token' => $token
        );
        echo json_encode($array);
    }

    public function register_mobile(Request $request){
        $request->validate([
            'nama' =>'required',
            'email' =>'required|email|unique:users',
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
        if($create){
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
}
