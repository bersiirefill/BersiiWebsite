<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Wallet;
use App\Models\RiwayatTopup;
use Illuminate\Support\Facades\DB;
use App\Services\Midtrans\CreateSnapTokenService;

class WalletController extends Controller
{
    //
    public function index(){
        $id = Auth::user()->id;
        $wallet = DB::table('riwayat_topup')
        ->where('id_user', $id)
        ->get();
        $saldo = Wallet::where('id', $id)->first();
        // dd($wallet);
        return view('dashboard.wallet.wallet', compact('wallet', 'saldo'));
    }

    public function checkout(Request $order){
        // $ceksnap = DB::table('riwayat_topup')
        // ->where('topup_id', '=', $request->id)
        // ->select('riwayat_topup.snap_token')
        // ->first();
        
        $snapToken = $order->snap_token;
        if (is_null($snapToken)) {
            // Jika snap token masih NULL, buat token snap dan simpan ke database
            $jeneng = $order->topup_id;
            $harga = 25000;
            dd($jeneng);
            // $midtrans = new CreateSnapTokenService($order);
            // $snapToken = $midtrans->getSnapToken($jeneng, $harga);
            // // dd($midtrans);
            // $order->snap_token = $snapToken;
            // $order->save();    
        }
        // return view('dashboard.wallet.checkout', compact('order', 'snapToken'));
    }

}
