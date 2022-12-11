<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;
    protected $table = 'refill_stations';
    protected $primaryKey = 'nomor_seri';
    protected $keyType = 'string';
    protected $fillable = [
        'nomor_seri',
        'latitude',
        'longitude',
        'alamat',
    ];

    public function isi_refill_stations(){
        return $this->hasMany('App\Models\IsiRefill', 'nomor_seri');
    }

    public function riwayat_refill_stations(){
        return $this->hasMany('App\Models\RiwayatRefill', 'nomor_seri');
    }
}
