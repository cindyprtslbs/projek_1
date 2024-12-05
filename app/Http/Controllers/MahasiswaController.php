<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class MahasiswaController extends Controller
{
    public function index(){
        return view('mahasiswa.dashboard');
    }
}
