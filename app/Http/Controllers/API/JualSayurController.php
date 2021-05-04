<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\SayurMobile;

class JualSayurController extends BaseController
{
    public function sayurmobile()
    {
        $sayurmobile = SayurMobile::all();
        return $this->sendResponse($sayurmobile);
    }

    public function delete(Request $request)
    {
    	$data = SayurMobile::findOrFail($request->id);
    	$data->delete();
    	return "sukses";
    }

    public function spesificSayur(Request $request)
    {
    	$data = SayurMobile::findOrFail($request->id);
    	return $this->sendResponse($data);
    }

    public function searchSayur(Request $request)
    {
        $keyword = $request->keyword;
        $search = SayurMobile::where('nama',"LIKE","%$keyword%")->paginate(20);
        return $this->sendResponse($search);
    }
}
