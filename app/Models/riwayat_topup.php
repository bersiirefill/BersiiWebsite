<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class riwayat_topup extends Model
{
    use HasFactory;
    protected $table = 'riwayat_topup';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_user',
        'nominal',
        'tanggal',
        'status'
    ];

    public function topup_users(){
        return $this->belongsTo('App\Models\User', 'id_user', 'id');
    }
}
