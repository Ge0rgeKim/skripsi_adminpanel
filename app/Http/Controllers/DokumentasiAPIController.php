<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dokumentasi;
class DokumentasiAPIController extends Controller
{
    public function index(){
        $dokumentasi = dokumentasi::all();
        $status = ['Data Belum Di Validasi','Data Dokumentasi Di Approved', 'Data Dokumentasi Di Tolak'];
        return view('dokumentasi.index',compact(['dokumentasi','status']));
    }
    public function edit($id){ 
        $dokumentasi = dokumentasi::find($id);
        $status = ['Data Belum Di Validasi','Data Dokumentasi Di Approved', 'Data Dokumentasi Di Tolak'];
        return view('dokumentasi.edit',compact(['dokumentasi','status']));
    }
    public function update(Request $request,$id){
        $dokumentasi = dokumentasi::find($id);
        $dokumentasi->id_sesi = $dokumentasi->id_sesi;
        $dokumentasi->id_guru = $dokumentasi->id_guru;
        $dokumentasi->id_admin = 3;
        $dokumentasi->keterangan = $dokumentasi->keterangan;
        $dokumentasi->foto_dokumentasi = $dokumentasi->foto_dokumentasi;
        if($request->status == "1"){
            $dokumentasi->status_dokumentasi = 1;
        }elseif($request->status == "2"){
            $dokumentasi->status_dokumentasi = 2;
        }
        $dokumentasi->save();
        return redirect('/dokumentasi');
    }
}
