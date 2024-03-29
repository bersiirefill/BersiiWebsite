<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\ProdukSupplier;
use Illuminate\Support\Facades\Storage;

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

    public function delete_supplier(Supplier $supplier, $kode_supplier){
        // $validate = $request->validate([
        //     'kode_supplier' => 'required|exists:suppliers,kode_supplier',
        // ]);
        $delete = Supplier::where('kode_supplier', $kode_supplier)->delete();
        // if($delete){
        //     return redirect('supplier')->with('success', 'Berhasil menghapus data');
        // }else{
        //     return redirect('supplier')->with('error', 'Gagal menghapus data');
        // }
    }

    public function update_supplier(Supplier $supplier, Request $request){
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

    // Produk Supplier
    public function new_product(Request $request){
        $validate = $request->validate([
            'kode_supplier' => 'required'
        ]);
        $data = $request->all();
        for ($i = 0; $i < sizeof($data['nama_produk']) || $i < sizeof($data['stok']); $i++) {
            $rands = 'PRD-'.rand();
            $image = $request->file('gambar_produk')[$i];
            $extension = $image->extension();
            $image->storePubliclyAs('public/upload/', $rands.'.'.$extension);
            $add = ProdukSupplier::create([
                'id_produk' => $rands,
                'kode_supplier' => $data['kode_supplier'],
                'nama_produk' => $data['nama_produk'][$i],
                'deskripsi_produk' => $data['deskripsi_produk'][$i],
                'stok' => $data['stok'][$i],
                'harga_produk' => $data['harga_produk'][$i],
                'gambar_produk' => $rands.'.'.$extension,
            ]);
        }
        return redirect('produk_supplier')->with('success', 'Berhasil mengubah data');
    }

    public function update_product(Request $request){
        $validate = $request->validate([
            'id_produk_edit' => 'required',
            'stok_edit' => 'required',
            'harga_edit' => 'required',
        ]);
        $data = $request->all();
        if($request->file('gambar_produk_edit')){
            // Masukkan File
            $image = $request->file('gambar_produk_edit');
            $extension = $image->extension();
            $id_produk = $request->id_produk_edit;
            $image->storePubliclyAs('public/upload/', $id_produk.'.'.$extension);

            $upd_prd = ProdukSupplier::where('id_produk', '=', $request->id_produk_edit)->update([
                'deskripsi_produk' => $data['deskripsi_produk_edit'],
                'stok' => $data['stok_edit'],
                'harga_produk' => $data['harga_edit'],
                'gambar_produk' => $image->hashName(),
            ]);
        }else{
            $upd_prd = ProdukSupplier::where('id_produk', '=', $request->id_produk_edit)->update([
                'deskripsi_produk' => $data['deskripsi_produk_edit'],
                'stok' => $data['stok_edit'],
                'harga_produk' => $data['harga_edit'],
            ]);
        }
        if($upd_prd){
            return redirect('produk_supplier')->with('success', 'Berhasil mengubah data');
        }else{
            return redirect('produk_supplier')->with('error', 'Gagal mengubah data');
        }
    }

    public function delete_product(ProdukSupplier $produksupplier, $id_produk){
        $delete = ProdukSupplier::where('id_produk', $id_produk)->delete();

    }
}
