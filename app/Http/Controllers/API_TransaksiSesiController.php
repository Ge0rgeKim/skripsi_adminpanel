<?php

namespace App\Http\Controllers;
use App\Models\transaksi_sesi;
use App\Models\saldo;
use App\Models\sesi;
use Illuminate\Http\Request;

class API_TransaksiSesiController extends Controller
{
    public function index(){
        $transaksi_sesi = transaksi_sesi::all();
        return response()->json(['message' => 'success', 'data' => $transaksi_sesi]);
    }
    public function show($id){
        $transaksi_sesi = transaksi_sesi::where('id_sesi',$id)->get();
        return response()->json(['message' => 'success', 'data' => $transaksi_sesi]);
    }
    public function historymurid($id){
        $transaksi_sesi = transaksi_sesi::where('id_murid',$id)->get();
        return response()->json(['message' => 'success', 'data' => $transaksi_sesi]);
    }
    public function store(Request $request, $id){
        $temp_sesi = transaksi_sesi::where('id_murid',$request->id_murid)->get();
        $ctr = transaksi_sesi::where('id_murid',$request->id_murid)->count();

        $id_trans = explode("/",$temp_sesi[$ctr-1]->id_transaksi);
        $new_id = $id_trans[2] + 1;
        $id_trans[2] = $new_id;
        $new_id_trans = implode("/",$id_trans);

        $transaksi_sesi = new transaksi_sesi();
        $transaksi_sesi->id_transaksi = $new_id_trans;
        $transaksi_sesi->id_sesi = $id;
        $transaksi_sesi->id_murid = $request->id_murid;
        $transaksi_sesi->id_guru = $request->id_guru;
        $transaksi_sesi->save();

        $sesi = sesi::find($id);
        $temp_saldo = saldo::where('id_murid',$request->id_murid)->get();
        $ctr_saldo = saldo::where('id_murid',$request->id_murid)->count();

        $saldo = new saldo();
        $saldo->id_transaksi = $new_id_trans;
        $saldo->id_admin = 0;
        $saldo->id_murid = $request->id_murid;
        $saldo->debit = 0;
        $saldo->credit = $sesi->nominal_saldo;
        $saldo->total = $temp_saldo[$ctr_saldo-1]->total - $sesi->nominal_saldo;
        $saldo->save();

        $sesi->status_sesi = 1;
        $sesi->save();
        return response()->json(['message' => 'success', 'data' => $transaksi_sesi]);
    }
    public function update(Request $request, $id){

    }
    public function destroy($id){
        $transaksi_sesi = transaksi_sesi::find($id);
        $transaksi_sesi->delete();
        return response()->json(['message' => 'success', 'data' => null]);
    }
}
