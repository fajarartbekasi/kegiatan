<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class KegiatanController extends Controller
{

    public function show()
    {
        $activitys = Activity::paginate(8);

        return view('kegiatan.show', compact('activitys'));
    }
    public function create($id)
    {
        $activity = Activity::findOrFail($id);

        return view('daftar.create', compact('activity'));
    }
}
