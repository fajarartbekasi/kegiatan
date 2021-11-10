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
    public function store()
    {
        $activity = Activity::create($this->validateRequest());

        $this->storeImage($activity);

        return redirect()->back();
    }
    private function validateRequest(){
        return tap(request()->validate([
            'nama_activity' => 'required',
            'idr'           => 'required',
            'status'        => 'required',
            'desc'          => 'required',
            'tgl_awal'      => 'required',
            'tgl_selesai'   => 'required',
            'peserta'       => 'required',
            'image'         => 'required|mimes:jpeg,jpg,png|max:5000',
        ]), function(){
            if(request()->hasFile('image')){
                request()->validate([
                    'image'    => 'required|mimes:jpeg,jpg,png|max:5000',
                ]);
            }
        });
    }
    private function storeImage($activity){
        if(request()->has('image')){
            $activity->update([
                'image'  => request()->image->store('uploads','public'),
            ]);

            $image = Image::make(public_path('storage/'. $activity->image))->fit(300,300, null, 'top-left');
            $image->save();
        }
    }
}
