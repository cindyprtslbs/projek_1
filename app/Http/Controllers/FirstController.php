<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstController extends Controller
{
    public function firstview()
    {
        return view ('myview');
    }

    public function kategoribuku()
    {
        return view ('buku1.kategori');
    }
}
