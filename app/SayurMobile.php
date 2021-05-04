<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SayurMobile extends Model
{
    protected $table = 'sayurmobile';
    protected $fillable = [
        'nama', 'jumlah', 'berat', 'harga', 'foto', 'kuantitas',
    ];

    public function foto()
    {
        return '/img/' . $this->foto;
    }
}
