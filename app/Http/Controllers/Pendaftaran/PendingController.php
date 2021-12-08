<?php

namespace App\Http\Controllers\Pendaftaran;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Register;

class PendingController extends Controller
{
    public function index()
    {
        $pendings = Register::where('status', 'pending')->paginate(6);
        return view('daftar.student.pending.index', compact('pendings'));
    }
}
