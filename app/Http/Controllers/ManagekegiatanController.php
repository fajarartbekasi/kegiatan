<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Http\Request;

class ManagekegiatanController extends Controller
{
    public function index()
    {
        $activitys = Activity::paginate(5);

        return view('kegiatan.index', compact('activitys'));
    }
    public function create()
    {
        return view('kegiatan.create');
    }
}
