@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row">
        @foreach($activitys as $activity)
            <div class="col-md-3">
                <div class="card" >
                    <img src="{{url('storage/'. $activity->image)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$activity->nama_activity}}</h5>
                        <h6 class="card-title">{{$activity->tgl_awal}} - {{$activity->tgl_selesai}}</h6>
                        <h6 class="card-title">{{$activity->idr}}</h6>
                        <h6 class="card-title">{{$activity->peserta}}</h6>
                        @if($activity->status == 'Cooming Soon')
                            <div class="alert alert-danger" role="alert">
                                <h3 class="text-white">{{$activity->status}}</h3>
                            </div>
                        @elseif($activity->status == 'Aktif')
                            <a href="#" class="btn btn-info">Daftar</a>
                        @elseif($activy->status == 'Non-Aktif')
                            <div class="alert alert-secondary" role="alert">
                                <h3 class="text-white">{{$activity->status}}</h3>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>
@endsection