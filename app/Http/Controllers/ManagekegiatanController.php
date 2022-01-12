<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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
    public function edit($id)
    {
        $activity = Activity::findOrFail($id);

        return view('kegiatan.edit', compact('activity'));
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
    public function destroy(Request $request, $id)
    {
        $activity = Activity::findOrFail($id);
        $activity->delete($request->all());

        if (\File::exists(public_path('storage/' . $activity->image))) {
            \File::delete(public_path('storage/' . $activity->image));
        }

        return redirect()->back();
    }
    public function updated(Request $request, Activity $activity)
    {
        $activity->update($request->all());
        $this->storeImage($activity);

        return redirect()->back();
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
