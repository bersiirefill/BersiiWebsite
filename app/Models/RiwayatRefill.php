<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatRefill extends Model
{
    use HasFactory;
    protected $table = 'riwayat_refills';
    protected $primaryKey = 'id_trx';
    protected $keyType = 'string';
    protected $fillable = [
        'id_trx',
        'nomor_seri',
        'id_user',
    ];

    public function data_refill_stations(){
        return $this->belongsTo('App\Models\Station', 'nomor_seri');
    }

    public function jenis_refill_riwayat(){
        return $this->hasMany('App\Models\JenisRefillRiwayat', 'id_trx');
    }
}
