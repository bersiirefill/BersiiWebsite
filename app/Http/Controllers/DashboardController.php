<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function dashboard(){
        $id = Auth::user()->id;
        $saldo = Wallet::where('id', $id)->first();
        return view('dashboard.dashboard', compact('saldo'));
    }
}
