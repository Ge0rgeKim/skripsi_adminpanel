<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SesiAPIController extends Controller
{
    public function index() {
        $sesi = sesi::all();
        return view('sesi.index',['sesi' => $sesi]);
    }
}
