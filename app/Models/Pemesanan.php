<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kost_id',
        'nama_penyewa',
        'tanggal_mulai',
        'tanggal_akhir'
    ];

    public function kost()
    {
        return $this->belongsTo(Kost::class);
    }
}
