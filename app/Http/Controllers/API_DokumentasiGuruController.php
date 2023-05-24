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
        $cek_dokumentasi = dokumentasi::where('id_sesi', $request->id_sesi)->get();
        if($cek_dokumentasi->isEmpty()){
            $dokumentasi = new dokumentasi();
            $dokumentasi->id_sesi = $request->id_sesi;
            $dokumentasi->id_guru = $request->id_guru;
            $dokumentasi->id_admin = 0;
            $dokumentasi->keterangan = $request->keterangan;
            $dokumentasi->status_dokumentasi = 0;
            if($request->hasFile('image')){
                $file = $request->file('image');
                $filename = md5($file . strtotime('now')) . '.' . $file->getClientOriginalExtension();
                $path = 'uploads/bukti_topup/';
                $file->move($path, $filename);
                $data_path = $path.$filename;
                $dokumentasi->foto_dokumentasi = $data_path;
            }
            $dokumentasi->save();
            return response()->json(['message' => 'success', 'data' => $dokumentasi]);
        }else{
            return response()->json(['message' => 'Data Dokumentasi Sudah Ada.', 'data' => $cek_dokumentasi]);
        }
        return response()->json(['message' => 'Tolong dicoba lagi.', 'data' => $cek_dokumentasi]);
    }
    public function update(Request $request, $id){

    }
    public function destroy($id){
        $dokumentasi = dokumentasi::find($id);
        $dokumentasi->delete();
        return response()->json(['message' => 'success', 'data' => null]);
    }
}
