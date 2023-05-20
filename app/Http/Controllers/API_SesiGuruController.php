<?php

namespace App\Http\Controllers;
use App\Models\sesi;
use Illuminate\Http\Request;

class API_SesiGuruController extends Controller
{
    public function index(){
        $sesi = sesi::all();
        return response()->json(['message' => 'success', 'data' => $sesi]);
    }
    public function show($id){
        $sesi = sesi::find($id);
        return response()->json(['message' => 'success', 'data' => $sesi]);
    }
    public function store(Request $request){
        $cek_sesi = sesi::where('waktu_sesi', $request->waktu_sesi)->where("tanggal_sesi", $request->tanggal_sesi)->where('id_guru',$request->id_guru)->get();
        if($cek_sesi->isEmpty()){
            $sesi = new sesi();
            $sesi->id_guru = $request->id_guru;
            $sesi->tanggal_sesi = $request->tanggal_sesi;
            $sesi->waktu_sesi = $request->waktu_sesi;
            $sesi->nominal_saldo = $request->nominal_saldo;
            $sesi->status_sesi = 0;
            $sesi->save();
            return response()->json(['message' => 'success', 'data' => $sesi]);
        }
        else{
            return response()->json(['message' => 'Jadwal Sesi Sudah Ada.', 'data' => $cek_sesi]);
        
        }
    }
    public function update(Request $request, $id){

    }
    public function destroy($id){
        $sesi = sesi::find($id);
        $sesi->delete();
        return response()->json(['message' => 'success', 'data' => null]);
    }
}
