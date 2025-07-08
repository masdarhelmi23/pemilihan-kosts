<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'kost_id',
        'nama_reviewer',
        'komentar',
        'rating'
    ];

    public function kost()
    {
        return $this->belongsTo(Kost::class);
    }
}
