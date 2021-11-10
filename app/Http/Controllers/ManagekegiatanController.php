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
       $kegiatan = Activity::create($this->validateRequest());

       $this->storeImage($kegiatan);

        return redirect()->back();
    }
    public function edit()
    {
        return view('kegiatan.edit');
    }
    private function validateRequest(){
        return tap(request()->validate([
            'kode_activity'   => 'required',
            'nama_activity'   => 'required',
            'image'           => 'required|mimes:jpeg,jpg,png|max:5000',
            'idr'             => 'required',
            'status'          => 'required',
            'desc'            => 'required',
            'peserta'         => 'required',
        ]), function(){
            if(request()->hasFile('image')){
                request()->validate([
                    'image'    => 'required|mimes:jpeg,jpg,png|max:5000',
                ]);
            }
        });
    }

    private function storeImage($kegiatan){
        if(request()->has('image')){
            $kegiatan->update([
                'image'  => request()->image->store('uploads','public'),
            ]);

            $image = Image::make(public_path('storage/'. $kegiatan->image))->fit(300,300, null, 'top-left');
            $image->save();
        }
    }
}
