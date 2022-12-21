<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Admin;
use App\Models\Station;
use App\Models\Supplier;
use App\Models\ProdukSupplier;
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

}
