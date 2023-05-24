<?php

namespace App\Http\Controllers;
use App\Models\mata_pelajaran;
use Illuminate\Http\Request;

class API_MataPelajaranController extends Controller
{
    public function index(){
        $mata_pelajaran = mata_pelajaran::get("mata_pelajaran");
        return response()->json(['message' => 'success', 'data' => $mata_pelajaran]);
    }
    
    public function show($id){
        $mata_pelajaran = mata_pelajaran::find($id);
        return response()->json(['message' => 'success', 'data' => $mata_pelajaran]);
    }

    public function store(Request $request){
        $mata_pelajaran = new mata_pelajaran();
        $mata_pelajaran->mata_pelajaran = $request->mata_pelajaran;
        $mata_pelajaran->status = 0;
        $mata_pelajaran->save();
        // mata_pelajaran::create($request->all);
        return response()->json(['message' => 'success', 'data' => $mata_pelajaran]);
    }

    public function update(Request $request,$id){
        $mata_pelajaran = mata_pelajaran::find($id);
        $mata_pelajaran->mata_pelajaran = $request->mata_pelajaran;
        if($request->status == "1"){
            $mata_pelajaran->status = 1;
        }elseif($request->status == "2"){
            $mata_pelajaran->status = 2;
        }
        $mata_pelajaran->save();
        return response()->json(['message' => 'success', 'data' => $mata_pelajaran]);
    }

    public function destroy($id){
        $mata_pelajaran = mata_pelajaran::find($id);
        $mata_pelajaran->delete();
        return response()->json(['message' => 'success', 'data' => null]);
    }
}
