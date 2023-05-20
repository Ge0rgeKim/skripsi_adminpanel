<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mata_pelajaran;
class MataPelajaranAPIController extends Controller
{
    //
    public function index(){
        $mata_pelajaran = mata_pelajaran::all();
        $status = ['Data pending','Data di approve','Data di tolak'];
        return view('mata_pelajaran.index',compact(['mata_pelajaran','status']));
    }

    public function create(){
        return view('mata_pelajaran.create');
    }

    public function store(Request $request){
        $mata_pelajaran = new mata_pelajaran();
        $mata_pelajaran->mata_pelajaran = $request->mata_pelajaran;
        $mata_pelajaran->status = 0;
        $mata_pelajaran->save();
        // mata_pelajaran::create($request->all);
        return redirect('/mata_pelajaran');
    }
    public function edit($id){ 
        // $mata_pelajaran = mata_pelajaran::where('id_mata_pelajaran',$id_mata_pelajaran)->get();
        // dd($mata_pelajaran,$id_mata_pelajaran);
        $mata_pelajaran = mata_pelajaran::find($id);
        $status = ['Data di pending','Approve Data','Tolak Data'];
        return view('mata_pelajaran.edit',compact(['mata_pelajaran','status']));
    }
    public function update(Request $request,$id){
        $mata_pelajaran = mata_pelajaran::find($id);
        $mata_pelajaran->mata_pelajaran = $mata_pelajaran->mata_pelajaran;
        if($request->status == "1"){
            $mata_pelajaran->status = 1;
        }elseif($request->status == "2"){
            $mata_pelajaran->status = 2;
        }
        $mata_pelajaran->save();
        return redirect('/mata_pelajaran');
    }
    public function destroy($id){
        $mata_pelajaran = mata_pelajaran::find($id);
        $mata_pelajaran->delete();
        return redirect('/mata_pelajaran');
    }

}
