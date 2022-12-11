<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\ProdukSupplier;

class WarehouseController extends Controller
{
    // Supplier
    public function new_supplier(Request $request){
        $rands = rand(100,1000);
        $kode = 'BSPL-'.$rands;
        $validate = $request->validate([
            'nama_pemilik' => 'required',
            'nama_toko' => 'required|unique:suppliers',
            'nomor_telepon' => 'required|unique:suppliers',
            'alamat' => 'required',
        ]);
        $data = $request->all();
        $add = Supplier::create([
            'kode_supplier' => $kode,
            'nama_pemilik' => $data['nama_pemilik'],
            'nama_toko' => $data['nama_toko'],
            'nomor_telepon' => $data['nomor_telepon'],
            'alamat' => $data['alamat'],
        ]);
        if($add){
            return redirect('supplier')->with('success', 'Berhasil menambahkan data');
        }else{
            return redirect('supplier')->with('error', 'Gagal menambahkan data');
        }
    }

    public function delete_supplier(Request $request){
        dd($request->all());
        // $validate = $request->validate([
        //     'kode_supplier' => 'exists:suppliers',
        // ]);
        // $delete = Supplier::where('kode_supplier', $request->kode_supplier)->delete();
        // if($delete){
        //     return redirect('supplier')->with('success', 'Berhasil menghapus data');
        // }else{
        //     return redirect('supplier')->with('error', 'Gagal menghapus data');
        // }
    }

    public function update_supplier(Request $request){
        $validate = $request->validate([
            'kode_edit' => 'required|exists:suppliers,kode_supplier',
        ]);
        $data = $request->all();
        $edit = Supplier::where('kode_supplier', $request->kode_edit)->update([
            'nama_pemilik' => $data['nama_pemilik_edit'],
            'nama_toko' => $data['nama_toko_edit'],
            'nomor_telepon' => $data['nomor_telepon_edit'],
            'alamat' => $data['alamat_edit'],
        ]);
        if($edit){
            return redirect('supplier')->with('success', 'Berhasil mengubah data');
        }else{
            return redirect('supplier')->with('error', 'Gagal mengubah data');
        }
    }
}
