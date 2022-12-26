<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Station;

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
}
