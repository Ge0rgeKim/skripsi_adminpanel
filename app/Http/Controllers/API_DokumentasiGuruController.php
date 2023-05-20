<?php

namespace App\Http\Controllers;
use App\Models\dokumentasi;
use Illuminate\Http\Request;

class API_DokumentasiGuruController extends Controller
{
    public function index(){
        $dokumentasi= dokumentasi::all();
        return response()->json(['message' => 'success', 'data' => $dokumentasi]);
    }
    public function show($id){
        $dokumentasi = dokumentasi::find($id);
        return response()->json(['message' => 'success', 'data' => $dokumentasi]);
    }
    public function store(Request $request){

    }
    public function update(Request $request, $id){

    }
    public function destroy($id){
        $dokumentasi = dokumentasi::find($id);
        $dokumentasi->delete();
        return response()->json(['message' => 'success', 'data' => null]);
    }
}
