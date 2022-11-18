<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatTopup extends Model
{
    use HasFactory;
    protected $table = 'riwayat_topup';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_user',
        'topup_id',
        'nominal',
        'tanggal',
        'payment_status',
        'snap_token'
    ];

    public function topup_users(){
        return $this->belongsTo('App\Models\User', 'id_user', 'id');
    }
}
