<?php

namespace App\Http\Controllers;
use App\Models\saldo;
use Illuminate\Http\Request;

class API_SaldoUserController extends Controller
{
    public function index(){
        $saldo = saldo::all();
        return response()->json(['message' => 'success', 'data' => $saldo]);
    }
    public function show($id){
        $saldo = saldo::where('id_murid',$id)->get();
        return response()->json(['message' => 'success', 'data' => $saldo]);
    }
    public function store(Request $request){

    }
    public function update(Request $request, $id){

    }
    public function destroy($id){
        $saldo = saldo::find($id);
        $saldo->delete();
        return response()->json(['message' => 'success', 'data' => null]);
    }
}
