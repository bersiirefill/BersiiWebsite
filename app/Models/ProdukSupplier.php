<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukSupplier extends Model
{
    use HasFactory;
    protected $table = 'produk_supplier';
    protected $primaryKey = 'id_produk';
    protected $keyType = 'string';
    protected $fillable = [
        'id_produk',
        'kode_supplier',
        'nama_produk',
        'stok'
    ];

    public function supplier(){
        return $this->belongsTo('App\Models\Supplier', 'kode_supplier');
    }

    public function isi_refill(){
        return $this->hasMany('App\Models\IsiRefill', 'id_produk');
    }

    public function data_jenis_refill(){
        return $this->hasMany('App\Models\JenisRefillRiwayat', 'id_produk');
    }
}
