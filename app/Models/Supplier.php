<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $table = 'suppliers';
    protected $primaryKey = 'kode_supplier';
    protected $keyType = 'string';
    protected $fillable = [
        'kode_supplier',
        'nama_pemilik',
        'nama_toko',
        'nomor_telepon',
        'alamat',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function produk_supplier(){
        return $this->hasMany('App\Models\ProdukSupplier', 'kode_supplier');
    }
}
