<?php

namespace App\Http\Controllers;

use App\Register;
use Illuminate\Http\Request;

class ResoultController extends Controller
{
    public function show($id)
    {
        $peserta = Register::findOrFail($id);
        return view('barcode', compact('peserta'));
    }
}
