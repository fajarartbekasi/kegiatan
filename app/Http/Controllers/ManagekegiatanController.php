<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagekegiatanController extends Controller
{
    public function index()
    {
        return view('kegiatan.index');
    }
    public function create()
    {
        return view('kegiatan.create');
    }
    public function edit()
    {
        return view('kegiatan.edit');
    }
}
