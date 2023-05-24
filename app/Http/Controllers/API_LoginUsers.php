<?php

namespace App\Http\Controllers;
use App\Models\user_guru;
use App\Models\user_murid;
use Illuminate\Http\Request;

class API_LoginUsers extends Controller
{
    public function reset(Request $request){
        if($request->users == "Guru"){
            $user_guru = user_guru::where('email',$request->email)->get();
            if($user_guru->isNotEmpty()){
                if($user_guru[0]->status_akun == 1){
                    $user_guru[0]->id_admin = $user_guru[0]->id_admin;
                    $user_guru[0]->username = $user_guru[0]->username;
                    $user_guru[0]->email = $user_guru[0]->email;
                    $user_guru[0]->mata_pelajaran = $user_guru[0]->mata_pelajaran;
                    $user_guru[0]->lokasi = $user_guru[0]->lokasi;
                    $user_guru[0]->status_sesi = $user_guru[0]->status_sesi;
                    $user_guru[0]->kontak = $user_guru[0]->kontak;
                    $user_guru[0]->status_akun = $user_guru[0]->status_akun;
                    $user_guru[0]->ktp = $user_guru[0]->ktp;
                    $user_guru[0]->password = $request->password;
                    $user_guru[0]->save();
                    return response()->json(['message' => 'success', 'data' => $user_guru]);
                }else{
                    return response()->json(['message' => 'Akun Guru Belum Divalidasi', 'data' => '']);
                }
            }else{
                return response()->json(['message' => 'Akun Guru Belum Terdaftar', 'data' => '']);
            }
        }else if($request->users == "Murid"){
            $user_murid = user_murid::where('email',$request->email)->get();
            if($user_murid->isNotEmpty()){
                $user_murid[0]->username = $user_murid[0]->username;
                $user_murid[0]->email = $user_murid[0]->email;
                $user_murid[0]->password = $request->password;
                $user_murid[0]->save();
                return response()->json(['message' => 'success', 'data' => $user_murid]);
            }
            else{
                return response()->json(['message' => 'Akun Murid Belum Terdaftar', 'data' => '']);
            }
        }
    }
    public function login(Request $request){
        if($request->users == "Guru"){
            $user_guru = user_guru::where('email',$request->email)->get();
            if($user_guru->isNotEmpty()){
                if($user_guru[0]->status_akun == 1){
                    if($user_guru[0]->password == $request->password){
                        return response()->json(['message' => 'success', 'data' => $user_guru[0]->id]);
                    }else{
                        return response()->json(['message' => 'Password Akun Guru Salah', 'data' => '']);
                    }
                }else{
                    return response()->json(['message' => 'Akun Guru Belum Divalidasi', 'data' => '']);
                }
            }else{
                return response()->json(['message' => 'Akun Guru Belum Terdaftar', 'data' => '']);
            }
        }else if($request->users == "Murid"){
            $user_murid = user_murid::where('email',$request->email)->get();
            if($user_murid->isNotEmpty()){
                if($user_murid[0]->password = $request->password){
                    return response()->json(['message' => 'success', 'data' => $user_murid[0]->id]);
                }else{
                    return response()->json(['message' => 'Password Akun Murid Salah', 'data' => '']);
                }
            }
            else{
                return response()->json(['message' => 'Akun Murid Belum Terdaftar', 'data' => '']);
            }
        }
    }
}
