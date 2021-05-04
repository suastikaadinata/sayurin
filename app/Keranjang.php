<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    protected $table = 'keranjang';
    protected $fillable = [
        'user_id', 'sayur_id', 'jumlah_sayur', 'total_harga',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sayur()
    {
        return $this->belongsTo(Sayur::class);
    }
}
