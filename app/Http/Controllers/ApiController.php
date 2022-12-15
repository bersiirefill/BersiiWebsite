<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class ApiController extends Controller
{
    public function list(){
        $suppliers = Supplier::get();
        return response()->json([
            'status' => 'success',
            'message'=> 'supplier list',
            'data' => $suppliers
        ], 200);
    }
}
