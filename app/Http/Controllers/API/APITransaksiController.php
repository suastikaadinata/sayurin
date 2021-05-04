<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Controllers\API\KeranjangController as KeranjangController;
use App\Transaksi;
use App\Keranjang;
use App\CartTransaksi;
use DB;

class APITransaksiController extends BaseController
{
    public function transaksi(Request $request)
    {
        $keranjang = new KeranjangController();
        $keranjang->cart($request);
        $user_id = $request->user_id;
        $data_cart = Keranjang::where('user_id',$user_id)->get();
        date_default_timezone_set('Asia/Jakarta');

        $transaksi = Transaksi::create([
            'user_id'           => $user_id,
            'alamat'            => $request->alamat,
            'note_alamat'       => $request->note_alamat,
            'metode_transaksi'  => 'COD',
            'waktu_pengiriman'  => $request->waktu_pengiriman,
        ]);

        for($i = 0; $i < count($data_cart); $i++){
            CartTransaksi::create([
                'transaksi_id'  => $transaksi->id,
                'sayur_id'      => $data_cart[$i]->sayur_id,
                'jumlah_sayur'  => $data_cart[$i]->jumlah_sayur,
                'total_harga'   => $data_cart[$i]->total_harga,
            ]);

            $data_cart[$i]->delete();
        }

        return 'success';
    }

    public function getDetailTransaksi(Request $request)
    {
        $transaksi = DB::table('transaksi')
                    ->where('transaksi.id', $request->id)
                    ->leftJoin('users','transaksi.user_id','=','users.id')
                    ->leftJoin('cart_transaksi','transaksi.id','=','cart_transaksi.transaksi_id')
                    ->leftJoin('sayurmobile','cart_transaksi.sayur_id','=','sayurmobile.id')
                    ->get();
        return $this->sendResponse($transaksi);
    }

    public function getAllTransaksi()
    {
        $transaksi = DB::table('users')
                    ->rightJoin('transaksi','transaksi.user_id','=','users.id')
                    ->get();
        return $this->sendResponse($transaksi);
    }

    public function onDelivery(Request $request)
    {
        $transaksi = Transaksi::findOrFail($request->transaksi_id);
        $transaksi->status_transaksi = 1; //sedang dikirim
        $transaksi->save();
        return "success";
    }

    public function complete(Request $request)
    {
        $transaksi = Transaksi::findOrFail($request->transaksi_id);
        $transaksi->status_transaksi = 2; //terkirim
        $transaksi->save();
        return "success";
    }
}
