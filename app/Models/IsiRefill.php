<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IsiRefill extends Model
{
    use HasFactory;
    protected $table = 'isi_refill';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_produk',
        'nomor_seri',
        'stok'
    ];

    public function val_produk_supplier(){
        return $this->belongsTo('App\Models\ProdukSupplier', 'id_produk');
    }

    public function refill_stations(){
        return $this->belongsTo('App\Models\Station', 'nomor_seri');
    }
}
