<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DatasiswaController extends Controller
{
    public function index()
    {
        return view('data.siswa.index');
    }

    public function create()
    {
        return view('data.siswa.create');
    }

    public function edit()
    {
        return view('data.siswa.edit');
    }
}
