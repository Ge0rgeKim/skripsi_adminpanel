<?php

namespace App\Http\Controllers;
use App\Models\report;
use Illuminate\Http\Request;

class API_ReportMuridController extends Controller
{
    public function index(){
        $report= report::all();
        return response()->json(['message' => 'success', 'data' => $report]);
    }
    public function show($id){
        $report = report::find($id);
        return response()->json(['message' => 'success', 'data' => $report]);
    }
    public function store(Request $request){
        $cek_report = report::where('id_sesi', $request->id_sesi)->get();

        if($cek_report->isEmpty()){
            $report = new report();
            $report->id_sesi = $request->id_sesi;
            $report->id_murid = $request->id_murid;
            $report->id_guru = $request->id_guru;
            $report->keterangan = $request->keterangan;
            $report->save();
            return response()->json(['message' => 'success', 'data' => $report]);
        }else{
            return response()->json(['message' => 'Data Report Sudah Ada.', 'data' => '']);
        }
    }
    public function update(Request $request, $id){

    }
    public function destroy($id){
        $report = report::find($id);
        $report->delete();
        return response()->json(['message' => 'success', 'data' => null]);
    }
}
