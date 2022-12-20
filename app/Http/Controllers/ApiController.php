<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ApiController extends Controller
{

    public function DefaultUnauthenticated()
    {
        return response()->json([
            'status' => 'failed',
            'message' => 'unauthenticated',
            'data' => null
        ]);
    }

    public function token(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Data pengguna tidak ditemukan'],
            ]);
        }
        // $user->tokens()->delete();
        $token = $user->createToken($request->device_name)->plainTextToken;
        return response()->json([
            'id' => $user->id,
            'nama' => $user->nama,
            'email' => $user->email,
            'nomor_telepon' => $user->nomor_telepon,
            'alamat' => $user->alamat,
            'token' => $token
        ]);
    }

    public function list(){
        $suppliers = Supplier::get();
        return response()->json([
            'status' => 'success',
            'message'=> 'supplier list',
            'data' => $suppliers
        ], 200);
    }

    

}
