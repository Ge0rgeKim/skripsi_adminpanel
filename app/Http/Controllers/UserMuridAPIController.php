<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user_murid;
class UserMuridAPIController extends Controller
{
    public function index() {
        $user_murid = user_murid::all();
        return view('user_murid.index',['user_murid' => $user_murid]);
    }
}
