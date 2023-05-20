<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user_guru;
class UserGuruAPIController extends Controller
{
    public function index() {
        $user_guru = user_guru::all();
        $status = ['Data Belum di Approve','Akun di Approve','Akun di Tolak'];
        $status_sesi = ['Online Onsite','Online','Onsite'];
        return view('user_guru.index',compact(['user_guru','status','status_sesi']));
    }
    public function edit($id){ 
        $user_guru = user_guru::find($id);
        $status = ['Data Belum di Approve','Akun di Approve','Akun di Tolak'];
        return view('user_guru.edit',compact(['user_guru','status']));
    }
    public function update(Request $request,$id){
        $user_guru = user_guru::find($id);
        $user_guru->id_admin = 3;
        $user_guru->username = $user_guru->username;
        $user_guru->email = $user_guru->email;
        $user_guru->password = $user_guru->password;
        $user_guru->mata_pelajaran = $user_guru->mata_pelajaran;
        $user_guru->lokasi = $user_guru->lokasi;
        $user_guru->status_sesi = $user_guru->status_sesi;
        $user_guru->ktp = $user_guru->ktp;
        if($request->status == "1"){
            $user_guru->status_akun = 1;
        }elseif($request->status == "2"){
            $user_guru->status_akun = 2;
        }
        $user_guru->save();
        return redirect('/user_guru');
    }
}
