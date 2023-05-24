<?php

namespace App\Http\Controllers;
use App\Models\sesi;
use App\Models\transaksi_sesi;
use App\Models\report;
use App\Models\review;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sesi = sesi::all();
        $transaksi_sesi = transaksi_sesi::all();
        $report = report::all();
        $review = review::all();
        $status = ['Sesi Belum Di Booking','Sesi Sudah Di Booking'];
        return view('home',compact(['sesi','transaksi_sesi','report','review','status']));
    }

    public function logout()
    {
        Session::flush();
        return redirect('login');
    }
}
