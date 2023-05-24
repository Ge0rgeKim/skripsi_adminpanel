<?php

namespace App\Http\Controllers;
use App\Models\user_guru;
use Illuminate\Http\Request;

class API_UserGuruController extends Controller
{
    public function index(){
        $user_guru = user_guru::all();
        return response()->json(['message' => 'success', 'data' => $user_guru]);
    }
    
    public function show($id){
        $user_guru = user_guru::find($id);
        return response()->json(['message' => 'success', 'data' => $user_guru]);
    }

    public function store(Request $request){
        $cek_guru = user_guru::where('email', $request->email)->get();
        if($cek_guru->isEmpty()){
            $user_guru = new user_guru();
            $user_guru->id_admin = 0;
            $user_guru->username = $request->username;
            $user_guru->email = $request->email;
            $user_guru->password = $request->password;
            $user_guru->mata_pelajaran = $request->mata_pelajaran;
            $user_guru->lokasi = $request->lokasi;
            $user_guru->status_sesi = 0;
            $user_guru->status_akun = 0;
            if($request->hasFile('image')){
                $file = $request->file('image');
                $filename = md5($file . strtotime('now')) . '.' . $file->getClientOriginalExtension();
                $path = 'uploads/foto_ktp/';
                $file->move($path, $filename);
                $data_path = $path.$filename;
                $user_guru->ktp= $data_path;
            }
            else{
                $user_guru->ktp = $request->ktp;
            }
            $user_guru->save();
            return response()->json(['message' => 'success', 'data' => $user_guru]);
        }else{
            return response()->json(['message' => 'Akun Guru Sudah Ada.', 'data' => $cek_guru]);
        }
        return response()->json(['message' => 'Tolong dicoba lagi.', 'data' => $cek_guru]);
    }

    public function update(Request $request,$id){
        $user_guru = user_guru::find($id);
        $user_guru->id_admin = $user_guru->id_admin;
        $user_guru->username = $request->username;
        $user_guru->email = $request->email;
        $user_guru->password = $request->password;
        $user_guru->mata_pelajaran = $request->mata_pelajaran;
        $user_guru->lokasi = $request->lokasi;
        if($request->status_sesi == "0"){
            $user_guru->status_sesi = 0;
        }
        if($request->status_sesi == "1"){
            $user_guru->status_sesi = 1;
        }
        if($request->status_sesi == "2"){
            $user_guru->status_sesi = 2;
        }
        $user_guru->status_akun = $user_guru->status_akun;
        $user_guru->ktp = $user_guru->ktp;
        $user_guru->save();
        return response()->json(['message' => 'success', 'data' => $user_guru]);
    }

    public function destroy($id){
        $user_guru = user_guru::find($id);
        $user_guru->delete();
        return response()->json(['message' => 'success', 'data' => null]);
    }
}
