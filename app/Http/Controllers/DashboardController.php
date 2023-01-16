<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Admin;
use App\Models\Station;
use App\Models\IsiRefill;
use App\Models\Supplier;
use App\Models\ProdukSupplier;
use App\Models\RiwayatRefill;
use App\Models\JenisRefillRiwayat;
use App\Models\RiwayatTopup;
// Planning - Tambah Agen & Driver

class DashboardController extends Controller
{
    //
    public function dashboard(){
        $user = User::all();
        $station = Station::all();
        return view('dashboard.dashboard', compact('user', 'station'));
    }

    public function supplier(){
        $supplier = Supplier::all();
        return view('dashboard.warehouse.supplier', compact('supplier'));
    }

    public function daftar_produk(){
        $daftar = DB::table('produk_supplier')
        ->join('suppliers', 'produk_supplier.kode_supplier', '=', 'suppliers.kode_supplier')
        ->select('produk_supplier.*', 'suppliers.nama_toko')
        ->get();
        $supplier = Supplier::all();
        return view('dashboard.warehouse.produk', compact('daftar', 'supplier'));
    }

    public function daftar_administrator(){
        $admin = Admin::all();
        return view('dashboard.administration.administrator', compact('admin'));
    }

    public function daftar_pengguna(){
        $pengguna = DB::table('users_bersiis')
        ->join('wallet', 'users_bersiis.id', '=', 'wallet.id')
        ->select('users_bersiis.*', 'wallet.saldo')
        ->get();
        return view('dashboard.administration.user', compact('pengguna'));
    }

    public function station(){
        $station = Station::all();
        return view('dashboard.station.station', compact('station'));
    }

    public function restock_station($nomor_seri){
        $ids = Station::where('nomor_seri', '=', $nomor_seri)->first();
        $station = DB::table('isi_refill')
        ->join('refill_stations', 'isi_refill.nomor_seri', '=', 'refill_stations.nomor_seri')
        ->join('produk_supplier', 'isi_refill.id_produk', '=', 'produk_supplier.id_produk')
        ->select('refill_stations.*', 'isi_refill.id_produk', 'isi_refill.stok', 'produk_supplier.nama_produk')
        ->get();
        $produk = ProdukSupplier::whereNotExists(function($query){
            $query->select(DB::raw(1))
                  ->from('isi_refill')
                  ->whereRaw('produk_supplier.id_produk = isi_refill.id_produk');
        })
        ->get();
        return view('dashboard.station.restock', compact('ids','station', 'produk'));
    }

    public function daftar_transaksi_refill(){
        $transaksi_refill = RiwayatRefill::all();
        return view('dashboard.transaksi.refill', compact('transaksi_refill'));
    }

    public function daftar_transaksi_topup(){
        $transaksi_topup = RiwayatTopup::all();
        return view('dashboard.transaksi.topup', compact('transaksi_topup'));
    }

}
