<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table ="users_bersiis";
    protected $primaryKey = "id";
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'nama',
        'email',
        'nomor_telepon',
        'alamat',
        'password',
        'forgot_token',
    ];

    public function wallet(){
        return $this->hasOne('App\Models\Wallet', 'id', 'id');
    }

    public function riwayat_topup(){
        return $this->hasMany('App\Models\RiwayatTopup', 'id_user', 'id');
    }

    public function user_riwayat_refill(){
        return $this->hasMany('App\Models\RiwayatRefill', 'id_user', 'id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
