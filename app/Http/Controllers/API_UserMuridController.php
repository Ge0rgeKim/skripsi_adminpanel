<?php

namespace App\Http\Controllers;
use App\Models\user_murid;
use App\Models\transaksi_saldo;
use App\Models\transaksi_sesi;
use App\Models\saldo;
use Illuminate\Http\Request;

class API_UserMuridController extends Controller
{
    public function index(){
        $user_murid = user_murid::all();
        return response()->json(['message' => 'success', 'data' => $user_murid]);
    }
    
    public function show($id){
        $user_murid = user_murid::find($id);
        return response()->json(['message' => 'success', 'data' => $user_murid]);
    }

    public function store(Request $request){
        $cek_murid = murid::where('email', $request->email)->get();
        if($cek_murid->isEmpty()){
            $user_murid = new user_murid();
            $user_murid->username = $request->username;
            $user_murid->email = $request->email;
            $user_murid->password = $request->password;
            $user_murid->save();
    
            $temp_murid = user_murid::where('email',$request->email)->get();
            $id_murid = $temp_murid[0]->id;
            $no_trans = "TOPUP/$id_murid/0"; 
            $transaksi_saldo = new transaksi_saldo();
            $transaksi_saldo->id_transaksi = $no_trans;
            $transaksi_saldo->id_murid = $temp_murid[0]->id;
            $transaksi_saldo->nominal_saldo = 100000;
            $transaksi_saldo->bukti_pembayaran = "0";
            $transaksi_saldo->status_pembayaran = 1;
            $transaksi_saldo->save();
    
            $saldo = new saldo();
            $saldo->id_transaksi = $no_trans;
            $saldo->id_admin = 0;
            $saldo->id_murid = $temp_murid[0]->id;
            $saldo->debit = 100000;
            $saldo->credit = 0;
            $saldo->total = 100000;
            $saldo->save();
    
            $no_sesi = "SESI/$id_murid/0";
            $transaksi_sesi = new transaksi_sesi();
            $transaksi_sesi->id_transaksi = $no_sesi;
            $transaksi_sesi->id_sesi = 0;
            $transaksi_sesi->id_murid = $temp_murid[0]->id;
            $transaksi_sesi->id_guru = 0;
            $transaksi_sesi->save();
            return response()->json(['message' => 'success', 'data' => $user_murid]);
        }else{
            return response()->json(['message' => 'Akun Murid Sudah Ada.', 'data' => $cek_murid]);
        }
        return response()->json(['message' => 'Tolong dicoba lagi.', 'data' => $cek_murid]);
    }

    public function update(Request $request,$id){
        $user_murid = user_murid::find($id);
        $user_murid->username = $request->username;
        $user_murid->email = $request->email;
        $user_murid->password = $request->password;
        $user_murid->save();
        return response()->json(['message' => 'success', 'data' => $user_murid]);
    }

    public function destroy($id){
        $user_murid = user_murid::find($id);
        $user_murid->delete();
        return response()->json(['message' => 'success', 'data' => null]);
    }
}
