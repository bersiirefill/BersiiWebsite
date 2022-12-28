<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
// Pakai Mail Controller
use App\Http\Controllers\MailController;

class UserController extends Controller
{
    //
    public function new_admin(Request $request){
        $validate = $request->validate([
            'email' => 'required|unique:admins',
            'password' => 'required',
            'nama' => 'required|unique:admins',
            'jabatan' => 'required',
        ]);
        $rand1 = rand(100000,1000000);
        $data = $request->all();
        $create = Admin::create([
            'id_admin' => $rand1,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'nama' => $data['nama'],
            'jabatan' => $data['jabatan'],
        ]);
        if($create){
            return redirect('administrator')->with('success', 'Berhasil menambahkan data');
        }else{
            return redirect('administrator')->with('error', 'Gagal menambahkan data');
        }
    }

    public function delete_admin(Admin $admin, $id_admin){
        $delete = Admin::where('id_admin', $id_admin)->delete();
    }

    public function update_admin(Admin $admin, Request $request){
        $validate = $request->validate([
            'id_admin_edit' => 'required',
        ]);
        $data = $request->all();
        $edit = Admin::where('id_admin', $request->id_admin_edit)->update([
            'email' => $data['email_edit'],
            'password' => Hash::make($data['password_edit']),
            'nama' => $data['nama_edit'],
            'jabatan' => $data['jabatan_edit'],
        ]);
        if($edit){
            return redirect('administrator')->with('success', 'Berhasil mengubah data');
        }else{
            return redirect('administrator')->with('error', 'Gagal mengubah data');
        }
    }

    public function delete_pengguna(User $user, $id){
        $delete = User::where('id', $id)->delete();
    }

    public function reset_pengguna(User $user, $id){
        $rand1 = rand(100000,1000000);
        User::where('id', $id)->update([
            'forgot_token' => $rand1,
        ]);
        // Ambil nama
        $sch_name = DB::table('users_bersiis')
        ->select('nama', 'email')
        ->where('id', '=', $id)->first();
        // Kirim
        $snd = MailController::index($sch_name->nama, $sch_name->email, $rand1);
        if($snd == true){
            return redirect()->route('pengguna');
        }
    }
}
