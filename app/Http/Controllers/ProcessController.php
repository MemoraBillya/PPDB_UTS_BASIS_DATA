<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProcessController extends Controller
{
    public function prosedur()
    {
        return view('prosedur');
    }

    public function jadwal()
    {
        return view('jadwal'); 
    }

    public function pendaftaran()
    {
        return view('pendaftaran'); 
    }
}
