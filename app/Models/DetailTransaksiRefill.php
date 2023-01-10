<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksiRefill extends Model
{
    use HasFactory;
    protected $table = 'jenis_refill_riwayat';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_trx',
        'id_produk',
        'jumlah_refill',
        'harga',
    ];

    public function list(){
        $this->belongsTo('App\Models\DaftarTransaksiRefill', 'id_trx');
    }
}
