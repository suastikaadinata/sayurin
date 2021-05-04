<?php

namespace App\Http\Controllers;

use App\Sayur;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class SayurController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function manageSayur()
    {
        $sayur = Sayur::all();
        return view('manage-sayur',[
            'sayur' => $sayur
        ]);
    }

    public function tambahSayur()
    {
        return view('tambah-sayur');
    }

    public function save(Request $request)
    {
        $validation = [
            'gambar-sayur'  =>  'required|image|max:2000',
            'nama'          =>  'required|string|max:191',
            'harga'         =>  'required|numeric',
            'stok'          =>  'required|numeric',
            'kuantitas'     =>  'required|numeric',
            'jeniskuantitas'=>  'required|string|max:191',
        ];

        $this->validate($request, $validation);
        
        $data = $request->all();

        if($request->hasFile('gambar-sayur')){
            $files = $request->file('gambar-sayur');
            $path = $files->store('sayur', 'uploads');
        }

        $sayur = Sayur::create([
            'nama'      => $data['nama'],
            'jumlah'    => $data['stok'],
            'berat'     => $data['kuantitas'],
            'harga'     => $data['harga'],
            'foto'      => $path,
            'kuantitas' => $data['jeniskuantitas']
        ]);

        // return redirect('/manage-sayur/tambah-sayur')->with('addSayur',['tambah']);
        return redirect('/manage-sayur');
    }

    public function searchSayur()
    {
        $keyword = Input::get('search');
        $search = Sayur::where('nama',"LIKE","%$keyword%")->paginate(20);

        return view('manage-sayur',[
            'sayur' => $search
        ]);
    }

    public function sayurJson()
    {
        $sayur = Sayur::all();
        return response()->json($sayur,200);
    }

    public function detilSayur($id)
    {
        $sayur = Sayur::findOrFail($id);
        return view('detail-sayur', [
            'sayur' => $sayur
        ]);
    }

    public function editSayur($id)
    {
        $sayur = Sayur::findOrFail($id);
        return view('edit-sayur', [
            'sayur' => $sayur
        ]);
    }

    public function delete($id)
    {
        $sayur = Sayur::findOrFail($id);
        $sayur->delete();
        return redirect('/manage-sayur');
    }

    public function simpanPerbaharuan(Request $request)
    {
        $sayur = Sayur::findOrFail($request->sayur_id);
        $validation = [
            'nama'          =>  'required|string|max:191',
            'harga'         =>  'required|numeric',
            'stok'          =>  'required|numeric',
            'kuantitas'     =>  'required|numeric',
            'jeniskuantitas'=>  'required|string|max:191',
        ];

        $this->validate($request, $validation);
        
        $data = $request->all();

        if($request->hasFile('gambar-sayur')){
            $files = $request->file('gambar-sayur');
            $path = $files->store('sayur', 'uploads');
            unlink(public_path() . '/img/'.$sayur->foto);
        }else{
            $path = $sayur->foto;
        }

        $sayur->nama      = $data['nama'];
        $sayur->jumlah    = $data['stok'];
        $sayur->berat     = $data['kuantitas'];
        $sayur->harga     = $data['harga'];
        $sayur->foto      = $path;
        $sayur->kuantitas = $data['jeniskuantitas'];

        $sayur->save();

        return redirect('/manage-sayur');
    }

}
