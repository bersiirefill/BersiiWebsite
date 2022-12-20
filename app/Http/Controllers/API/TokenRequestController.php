<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

class TokenRequestController extends Controller
{
    //
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
}
