<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Station;
use App\Models\Supplier;
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
}
