<?php

namespace App\Http\Controllers;
use App\Models\review;
use Illuminate\Http\Request;

class API_ReviewMuridController extends Controller
{
    public function index(){
        $review = review::all();
        return response()->json(['message' => 'success', 'data' => $review]);
    }
    public function show($id){
        $review = review::find($id);
        return response()->json(['message' => 'success', 'data' => $review]);
    }
    public function store(Request $request){
        // SELECT * FROM `reviews` INNER JOIN sesis ON reviews.id_sesi = sesis.id;
        $cek_review = review::where('id_sesi', $request->id_sesi)->get();
        if($cek_review->isEmpty()){
            $review = new review();
            $review->id_sesi = $request->id_sesi;
            $review->id_murid = $request->id_murid;
            $review->id_guru = $request->id_guru;
            $review->penilaian_sesi = $request->penilaian_sesi;
            $review->komentar_sesi = $request->komentar_sesi;
            $review->save();
            return response()->json(['message' => 'success', 'data' => $review]);
        }else{
            return response()->json(['message' => 'Data Review Sudah Ada.', 'data' => $cek_review]);
        }
        return response()->json(['message' => 'Tolong dicoba lagi.', 'data' => $cek_review]);
    }
    public function update(Request $request, $id){

    }
    public function destroy($id){
        $review = review::find($id);
        $review->delete();
        return response()->json(['message' => 'success', 'data' => null]);
    }
}
