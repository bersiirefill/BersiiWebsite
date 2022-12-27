<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Station extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'refill_stations';
    protected $primaryKey = 'nomor_seri';
    protected $keyType = 'string';
    protected $fillable = [
        'nomor_seri',
        'latitude',
        'longitude',
        'status_mesin',
        'alamat',
    ];

    public function isi_refill_stations(){
        return $this->hasMany('App\Models\IsiRefill', 'nomor_seri');
    }

    public function riwayat_refill_stations(){
        return $this->hasMany('App\Models\RiwayatRefill', 'nomor_seri');
    }
}
