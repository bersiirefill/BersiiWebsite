<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Station;
use App\Models\IsiRefill;
use App\Models\ProdukSupplier;

class StationController extends Controller
{
    public function new_station(Request $request){
        $validate = $request->validate([
            'nomor_seri' => 'required|unique:refill_stations',
            'latitude_add' => 'required',
            'longitude_add' => 'required',
            'alamat' => 'required',
        ]);
        $data = $request->all();
        $status = 0;
        $create = Station::create([
            'nomor_seri' => $data['nomor_seri'],
            'latitude' => $data['latitude_add'],
            'longitude' => $data['longitude_add'],
            'status_mesin' => $status,
            'alamat' => $data['alamat']
        ]);
        if($create){
            return redirect('station')->with('success', 'Berhasil menambahkan data');
        }else{
            return redirect('station')->with('error', 'Gagal menambahkan data');
        }
    }

    public function update_station(Request $request){
        $validate = $request->validate([
            'nomor_seri_edit' => 'required',
            'latitude_edit' => 'required',
            'longitude_edit' => 'required',
            'alamat_edit' => 'required',
        ]);
        $data = $request->all();
        $update = Station::where('nomor_seri', '=', $request->nomor_seri)->update([
            'latitude' => $data['latitude_edit'],
            'longitude' => $data['longitude_edit'],
            'alamat' => $data['alamat_edit']
        ]);
        if($update){
            return redirect('station')->with('success', 'Berhasil mengubah data');
        }else{
            return redirect('station')->with('error', 'Gagal mengubah data');
        }
    }

    public function delete_station(Station $station, $nomor_seri){
        $delete = Station::where('nomor_seri', $nomor_seri)->delete();
    }

    public function save_restock_station(Request $request){
        $validate = $request->validate([
            'nomor_seri' => 'required',
            'id_produk' => 'required',
            'stok' => 'required',
        ]);
        $data = $request->all();
        $stock = IsiRefill::create([
            'id_produk' => $data['id_produk'],
            'nomor_seri' => $data['nomor_seri'],
            'stok' => $data['stok'],
        ]);
        // Kurangi stok yang tersedia di warehouse
        $refill = ProdukSupplier::where('id_produk', $data['id_produk'])->first();
        if($refill->stok <= 0){
            return redirect()->route('restock_station', ['nomor_seri' => $request->nomor_seri])->with('error', 'Stok warehouse habis');
        }else{
            $update = ProdukSupplier::where('id_produk', $data['id_produk'])->update([
                'stok' => $refill['stok'] - $data['stok'],
            ]);
            if($update){
                return redirect()->route('restock_station', ['nomor_seri' => $request->nomor_seri])->with('success', 'Berhasil menambah stok');
            }else{
                return redirect()->route('restock_station', ['nomor_seri' => $request->nomor_seri])->with('error', 'Gagal menambah stok');
            }
        }
    }

    public function update_restock_station(Request $request){
        $validate = $request->validate([
            'id_produk_edit' => 'required',
            'stok_edit' => 'required',
        ]);
        $data = $request->all();
        $update_rst = IsiRefill::where('id_produk', $request->id_produk_edit)->update([
            'stok' => $data['stok_edit']
        ]);
        if($update){
            return redirect()->route('restock_station', ['nomor_seri' => $request->nomor_seri])->with('success', 'Berhasil mengubah stok');
        }else{
            return redirect()->route('restock_station', ['nomor_seri' => $request->nomor_seri])->with('error', 'Gagal mengubah stok');
        }
    }

    public function delete_restock_station(IsiRefill $isirefill, $id_produk){
        $delete = IsiRefill::where('id_produk', $id_produk)->delete();
    }
}
