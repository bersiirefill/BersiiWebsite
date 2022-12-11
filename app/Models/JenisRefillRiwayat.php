<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisRefillRiwayat extends Model
{
    use HasFactory;
    protected $table = 'jenis_refill_riwayat';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_trx',
        'id_produk',
        'jumlah',
    ];

    public function data_produk_supplier(){
        return $this->belongsTo('App\Models\Supplier', 'kode_supplier');
    }

    public function data_riwayat_refills(){
        return $this->belongsTo('App\Models\RiwayatRefill', 'id_trx');
    }
}
