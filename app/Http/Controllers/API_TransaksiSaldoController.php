<?php

namespace App\Http\Controllers;
use App\Models\transaksi_saldo;
use Illuminate\Http\Request;

class API_TransaksiSaldoController extends Controller
{
    public function index(){
        $transaksi_saldo = transaksi_saldo::all();
        return response()->json(['message' => 'success', 'data' => $transaksi_saldo]);
    }
    public function show($id){
        $transaksi_saldo = transaksi_saldo::find($id);
        return response()->json(['message' => 'success', 'data' => $transaksi_saldo]);
    }
    public function store(Request $request, $id){
        $temp_saldo = transaksi_saldo::where('id_murid',$id)->get();
        $ctr = transaksi_saldo::where('id_murid',$id)->count();

        $id_trans = explode("/",$temp_saldo[$ctr-1]->id_transaksi);
        $new_id = $id_trans[2] + 1;
        $id_trans[2] = $new_id;
        $new_id_trans = implode("/",$id_trans);

        $transaksi_saldo = new transaksi_saldo();
        $transaksi_saldo->id_transaksi = $new_id_trans;
        $transaksi_saldo->id_murid = $id;
        $transaksi_saldo->nominal_saldo = $request->nominal_saldo;
        $transaksi_saldo->status_pembayaran = 0;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = md5($file . strtotime('now')) . '.' . $file->getClientOriginalExtension();
            $path = 'uploads/bukti_topup/';
            $file->move($path, $filename);
            $data_path = $path.$filename;
            $transaksi_saldo->bukti_pembayaran= $data_path;
        }
        $transaksi_saldo->save();

        return response()->json(['message' => 'success', 'data' => $transaksi_saldo]);
    
    }
    public function update(Request $request, $id){

    }
    public function destroy($id){
        $transaksi_saldo = transaksi_saldo::find($id);
        $transaksi_saldo->delete();
        return response()->json(['message' => 'success', 'data' => null]);
    }
}
