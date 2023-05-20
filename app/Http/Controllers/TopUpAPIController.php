<?php

namespace App\Http\Controllers;
use App\Models\transaksi_saldo;
use App\Models\saldo;
use Illuminate\Http\Request;

class TopUpAPIController extends Controller
{
    public function index() {
        $transaksi_saldo = transaksi_saldo::all();
        $status = ['Data Belum di Approve','Data di Approve','Data di Tolak'];
        return view('transaksi_saldo.index',compact(['transaksi_saldo','status']));
    }
    public function edit($id){ 
        $transaksi_saldo = transaksi_saldo::find($id);
        $status = ['Data Belum di Approve','Data di Approve','Data di Tolak'];
        return view('transaksi_saldo.edit',compact(['transaksi_saldo','status']));
    }
    public function update(Request $request,$id){
        $transaksi_saldo = transaksi_saldo::find($id);
        $transaksi_saldo->id = $transaksi_saldo->id;
        $transaksi_saldo->id_murid = $transaksi_saldo->id_murid;
        $transaksi_saldo->id_transaksi = $transaksi_saldo->id_transaksi;
        $transaksi_saldo->nominal_saldo = $transaksi_saldo->nominal_saldo;
        $transaksi_saldo->bukti_pembayaran = $transaksi_saldo->bukti_pembayaran ;
        $transaksi_saldo->created_at = $transaksi_saldo->created_at;
        $transaksi_saldo->updated_at = $transaksi_saldo->updated_at;
        if($request->status == "1"){
            $transaksi_saldo->status_pembayaran = 1;
        }elseif($request->status == "2"){
            $transaksi_saldo->status_pembayaran = 2;
        }
        $transaksi_saldo->save();

        $temp_saldo = saldo::where('id_murid',$transaksi_saldo->id_murid)->get();
        $ctr = saldo::where('id_murid',$transaksi_saldo->id_murid)->count();

        $saldo = new saldo();
        $saldo->id_transaksi = $transaksi_saldo->id_transaksi;
        $saldo->id_admin = 3;
        $saldo->id_murid = $transaksi_saldo->id_murid;
        $saldo->debit = $transaksi_saldo->nominal_saldo;
        $saldo->credit = 0;
        $saldo->total = $temp_saldo[$ctr-1]->total + $transaksi_saldo->nominal_saldo;
        $saldo->save();
        return redirect('/transaksi_saldo');
    }
}
