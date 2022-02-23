<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Register;
use App\Payment;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PaymentController extends Controller
{
    public function create($id)
    {
        $pembayaran = Register::findOrFail($id);

        return view('verifikasi.pendaftaran.pembayaran', compact('pembayaran'));
    }

    public function store()
    {
        $verifikasi = Payment::create($this->validateRequest());

        $this->storeImage($verifikasi);


        if($verifikasi->save()){
            $pembayaran = Register::findOrFail($verifikasi->register_id);
            $pembayaran->update([
                'status'    => 'terverifikasi'
            ]);

            if($pembayaran->save()){
                $activity = Activity::
                        findOrFail($pembayaran->activity_id);

                $hitung = $activity->peserta - $pembayaran->qty;
                $activity->update([
                    'peserta'   => $hitung
                ]);
            }

        }
       return redirect()->back();
    }

    private function validateRequest(){
        return tap(request()->validate([
            'register_id'   => 'required',
            'image'         => 'required|mimes:jpeg,jpg,png|max:5000',
            'description'   => 'required',
        ]), function(){
            if(request()->hasFile('image')){
                request()->validate([
                    'image'    => 'required|mimes:jpeg,jpg,png|max:5000',
                ]);
            }
        });
    }
    private function storeImage($verifikasi){
        if(request()->has('image')){
            $verifikasi->update([
                'image'  => request()->image->store('uploads','public'),
            ]);

            $image = Image::make(public_path('storage/'. $verifikasi->image))->fit(300,300, null, 'top-left');
            $image->save();
        }
    }
}
