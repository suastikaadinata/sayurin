<?php

namespace App\Http\Controllers;

use App\Sayur;
use Illuminate\Http\Request;
use App\Transaksi;
use App\User;

class HomeController extends Controller
{
    public function __construct()
    {
       $this->middleware(['auth', 'admin']);
    }

    public function home()
    {
        $sayur = Sayur::all();
        $user = User::all();
        $belumdibayar = count(Transaksi::where('status_transaksi', 0)->orWhere('status_transaksi', 1)->get());
        $sukses = count(Transaksi::where('status_transaksi', 2)->get());
        return view('home',[
            'sayur'             => $sayur,
            'belumdibayar'      => $belumdibayar,
            'sukses'            => $sukses,
            'user'              => $user,
        ]);
    }
}
