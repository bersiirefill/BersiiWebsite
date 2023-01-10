<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarTransaksiRefill extends Model
{
    use HasFactory;
    protected $table = 'riwayat_refills';
    protected $primaryKey = 'id_trx';
    protected $keyType = 'string';
    protected $fillable = [
        'id_trx',
        'nomor_seri',
        'id_user',
        'total_harga',
    ];

    public function detail(){
        $this->hasMany('App\Models\DetailTransaksiRefill', 'id_trx');
    }
}
