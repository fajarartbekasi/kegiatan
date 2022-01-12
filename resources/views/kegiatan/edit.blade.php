@extends('layouts.app')

@section('content')

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Tambah Data kegiatan</li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-body">
            <div class="alert alert-primary" role="alert">
                <h3>Perhatian !!!</h3>
                Silahkan isi data dibawah ini dengan benar.
            </div>

            <form action="{{route('updated.data.activity',$activity->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Nama Kegiatan</label>
                            <input type="text" name="nama_activity" class="form-control" value="{{$activity->nama_activity}}" id="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control"  id="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">IDR</label>
                            <input type="text" name="idr" class="form-control" value="{{$activity->idr}}" id="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Status</label>
                            <select name="status" class="form-control" id="">
                                <option value="">Silahkan Pilih Status</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Non-Aktif">Non-Aktif</option>
                                <option value="Cooming Soon">Cooming Soon</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <textarea name="desc" id="" class="form-control" >
                                {{$activity->desc}}
                            </textarea>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Tanggal Mulai</label>
                            <input type="date" name="tgl_awal" class="form-control" value="{{$activity->tgl_awal}}" id="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Tanggal Selesai</label>
                            <input type="date" name="tgl_selesai" class="form-control" value="{{$activity->tgl_selesai}}" id="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Jumlah Peserta</label>
                            <input type="number" name="peserta" class="form-control" value="{{$activity->peserta}}" id="">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-info">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
