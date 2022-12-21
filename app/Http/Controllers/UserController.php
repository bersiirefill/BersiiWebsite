<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

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
            'id_admin_edit' => 'required|exists:admins',
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
}
