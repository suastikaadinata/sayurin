<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartTransaksi extends Model
{
    protected $table = 'cart_transaksi';
    protected $fillable = [
        'transaksi_id', 'sayur_id', 'jumlah_sayur', 'total_harga'
    ];
}
