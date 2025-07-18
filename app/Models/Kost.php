<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kost extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kost',
        'alamat',
        'harga_per_bulan',
        'fasilitas',
    ];

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class);
    }

    public function photos()
    {
        return $this->hasMany(KostPhoto::class);
    }
    public function reviews()
{
    return $this->hasMany(Review::class);
}
}
