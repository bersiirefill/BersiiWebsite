<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\User;
use App\Models\Admin;
use App\Models\Station;
use App\Models\IsiRefill;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;

class StationApiController extends Controller
{

    public function DefaultUnauthenticated(){
        return response()->json([
            'status' => 'failed',
            'message' => 'unauthenticated',
            'data' => NULL
        ]);
    }
    
    // Raspberry Pi Station
    public function login_station(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'nomor_seri' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();
        if(!$user || ! Hash::check($request->password, $user->password)){
            throw ValidationException::withMessages([
                'token' => ['Data pengguna tidak ditemukan'],
            ]);
        }
        $token = $user->createToken($request->nomor_seri)->plainTextToken;
        if($token){
            return response()->json([
                'status' => 1,
                'message' => 'Sukses',
                'data' => [
                    'id' => $user->id,
                    'nama' => $user->nama,
                    'email' => $user->email,
                    'nomor_telepon' => $user->nomor_telepon,
                    'alamat' => $user->alamat,
                    'token' => $token,
                ],
            ], 200);
        }else{
            return response()->json([
                'status' => 0,
                'message' => 'Gagal',
                'data' => NULL,
            ], 500);
        }
    }

    public function login_station_admin(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'nomor_seri' => 'required',
        ]);
        $admin = Admin::where('email', $request->email)->first();
        if(!$admin || ! Hash::check($request->password, $admin->password)){
            throw ValidationException::withMessages([
                'token' => ['Data admin tidak ditemukan'],
            ]);
        }
        $token = $admin->createToken($request->nomor_seri)->plainTextToken;
        if($token){
            return response()->json([
                'status' => 1,
                'message' => 'Sukses',
                'data' => [
                    'id_admin' => $admin->id_admin,
                    'nama' => $admin->nama,
                    'email' => $admin->email,
                    'jabatan' => $admin->jabatan,
                    'token' => $token,
                ],
            ], 200);
        }else{
            return response()->json([
                'status' => 0,
                'message' => 'Gagal',
                'data' => NULL,
            ], 500);
        }
    }

    public function revoke_station(Request $request){
        // $station = Station::where('nomor_seri', $request->nomor_seri)->first();
        $del = DB::table('personal_access_tokens')
        ->where('id', '=', $request->token_id)
        ->delete();
        // $del = $station->tokens()->where('id', $request->token_id)->delete();
        if($del){
            return response()->json([
                'status' => 1,
                'message' => 'Token Dicabut',
            ], 200);
        }else{
            return response()->json([
                'status' => 0,
                'message' => 'Token Gagal Dicabut',
            ], 500);
        }
    }

    public function revoke_all(Request $request){
        // $station = Station::where('nomor_seri', $request->nomor_seri)->first();
        $del = DB::table('personal_access_tokens')
        ->where('name', '=', $request->nomor_seri)
        ->delete();
        if($del){
            return response()->json([
                'status' => 1,
                'message' => 'Token Dicabut',
            ], 200);
        }else{
            return response()->json([
                'status' => 0,
                'message' => 'Token Gagal Dicabut',
            ], 500);
        }
    }

    public function station_status(Request $request){
        $validate = $request->validate([
            'nomor_seri' => 'required',
        ]);
        $data = $request->all();
        $check = Station::where('nomor_seri', '=', $request->nomor_seri)
        ->first();
        if($check){
            if($check->status_mesin == 0){
                $sts = 'Tidak Aktif';
            }else if($check->status_mesin == 1){
                $sts = 'Aktif';
            }else{
                $sts = 'Maintenance';
            }
            return response()->json([
                'status' => 1,
                'message'=> 'Sukses',
                'data' => [
                    'nomor_seri' => $check->nomor_seri,
                    'latitude' => $check->latitude,
                    'longitude' => $check->longitude,
                    'status_mesin' => $sts,
                    'alamat' => $check->alamat,
                    'update_terakhir' => $check->updated_at,
                ],
            ], 200);
        }else{
            return response()->json([
                'status' => 0,
                'message' => 'Gagal',
                'data' => NULL,
            ], 500);
        }
    }

    public function change_station_status(Request $request){
        $validate = $request->validate([
            'nomor_seri' => 'required',
        ]);
        $data = $request->all();
        $chg = Station::where('nomor_seri', '=', $request->nomor_seri)->update([
            'status_mesin' => $request->status
        ]);
        if($chg){
            return response()->json([
                'status' => 1,
                'message' => 'Status Diperbarui',
            ], 200);
        }else{
            return response()->json([
                'status' => 0,
                'message' => 'Status Gagal Diperbarui',
            ], 200);
        }
    }

    public function startup(Request $request){
        $validate = $request->validate([
            'nomor_seri' => 'required'
        ]);
        $data = $request->all();
        $station = Station::where('nomor_seri', '=', $request->nomor_seri)->update([
            'status_mesin' => 1
        ]);
        if($station){
            return response()->json([
                'status' => 1,
                'message' => 'Status Diperbarui',
            ], 200);
        }else{
            return response()->json([
                'status' => 0,
                'message' => 'Status Gagal Diperbarui',
            ], 200);
        }
    }

    public function list(){
        $suppliers = Supplier::get();
        return response()->json([
            'status' => 'success',
            'message'=> 'supplier list',
            'data' => $suppliers
        ], 200);
    }

    public function station_stock(Request $request){
        $validate = $request->validate([
            'nomor_seri' => 'required',
        ]);
        $data = $request->all();
        $isi = DB::table('isi_refill')
        ->join('produk_supplier', 'isi_refill.id_produk', '=', 'produk_supplier.id_produk')
        ->select('isi_refill.*', 'produk_supplier.nama_produk')
        ->where('nomor_seri', '=', $data['nomor_seri'])
        ->get();
        if($isi){
            return response()->json([
                'status' => 1,
                'message'=> 'Sukses',
                'data' => $isi,
            ], 200);
        }else{
            return response()->json([
                'status' => 0,
                'message'=> 'Gagal',
                'data' => NULL,
            ], 200);
        }
        
    }

}
