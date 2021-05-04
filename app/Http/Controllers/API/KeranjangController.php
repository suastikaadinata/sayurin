<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Keranjang;
use App\SayurMobile;
use DB;

class KeranjangController extends BaseController
{
    public function cart(Request $request)
    {
        $data_cart = Keranjang::all();
        $user_id = $request->user_id;
        $sayur_cart = $request->sayur_id;
        $jumlah = $request->jumlah;

        for($i = 0; $i < count($data_cart); $i++){
            if($data_cart[$i]->user_id == $user_id){
                $data_cart[$i]->delete();
            }
        }

        for($i = 0; $i < count($sayur_cart); $i++){
            $sayur = SayurMobile::findOrFail($sayur_cart[$i]);
            $total_harga[$i] = $jumlah[$i] * $sayur->harga;

            Keranjang::create([
                'user_id'           => $user_id,
                'sayur_id'          => $sayur->id,
                'jumlah_sayur'      => $jumlah[$i],
                'total_harga'       => $total_harga[$i],
            ]);
        }

        return "success";
    }

    public function getCart(Request $request)
    {
        $sayur = DB::table('keranjang')
                ->where('user_id', $request->id)
                ->leftJoin('sayurmobile','sayurmobile.id','=','keranjang.sayur_id')
                ->get();
        return $this->sendResponse($sayur);
    }
}
