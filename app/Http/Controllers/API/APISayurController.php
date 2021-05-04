<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Sayur;
use App\SayurMobile;
use Illuminate\Support\Facades\Auth;
use Validator;

class APISayurController extends BaseController
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function show()
    {
        $sayur = Sayur::all();
        return $this->sendResponse($sayur);
    }

    public function adminTambahSayur(Request $request)
    {
        $sayur = Sayur::findOrFail($request->id);

        $sayurmobile = SayurMobile::create([
            'nama'      => $sayur->nama,
            'jumlah'    => $sayur->jumlah,
            'berat'     => $sayur->berat,
            'harga'     => $sayur->harga,
            'foto'      => $sayur->foto,
            'kuantitas' => $sayur->kuantitas,
        ]);

        $sayur->delete();

        return $this->sendResponse($sayur);
    }

    public function editSayur(Request $request)
    {
        $sayur = SayurMobile::findOrFail($request->id);
        $data = $request->all();
        $random = $this->random_word(20);
        $pathFile = $random.".png";

        if($sayur->foto != $data['foto']){
            $file = base64_decode($request->foto);
        }

         $validation = Validator::make($request->all(), [
            'nama'          => 'required|string|max:191',
            'harga'         => 'required|numeric',
            'kuantitas'     =>  'required|numeric',
            'jeniskuantitas'=>  'required|string|max:191',
        ]);   

        if($validation->fails()){
            $response['status'] = "failed";
            return $this->sendResponse($response); 
        }else{
            $sayur->nama = $data['nama'];
            $sayur->harga = $data['harga'];
            $sayur->berat = $data['kuantitas'];
            $sayur->kuantitas = $data['jeniskuantitas'];
            if($data['foto'] != null){
                if($sayur->foto != $data['foto']){
                    $img[0] = imagecreatefromstring($file);
                    $pathDatabase = 'sayur/'.$pathFile;
                    $path = public_path() . '/img/'.$pathDatabase;
                    imagepng($img[0], $path);
                    unlink(public_path() . '/img/'.$sayur->foto);
                    $sayur->foto = $pathDatabase;
                }
            }
            
            $sayur->save();
            $response['status'] = "success";
            return $this->sendResponse($response); 
        }   
    }

    public function random_word($id = 20){
        $pool = '1234567890abcdefghijkmnpqrstuvwxyz';
        
        $word = '';
        for ($i = 0; $i < $id; $i++){
            $word .= substr($pool, mt_rand(0, strlen($pool) -1), 1);
        }
        return $word; 
    }

    public function searchSayur(Request $request)
    {
        $keyword = $request->keyword;
        $search = Sayur::where('nama',"LIKE","%$keyword%")->paginate(20);
        return $this->sendResponse($search);
    }
}
