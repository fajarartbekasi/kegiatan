@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{route('manage-kegiatan.add-form')}}"
                        class="btn btn-secondary">Tambah Kegiatan</a>
                    </div>
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="date" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="date" class="form-control">
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-secondary">Cari Data</button>
                            </div>
                        </div>
                    </form>

                    <div class="mt-3">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Kode Kegiatan</th>
                                    <th>Nama Kegiatan</th>
                                    <th>IDR</th>
                                    <th>Status</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($activitys as $activity)
                                    <tr>
                                        <td>{{$activity->kode_activity}}</td>
                                        <td>{{$activity->nama_activity}}</td>
                                        <td>{{$activity->idr}}</td>
                                        <td>{{$activity->status}}</td>
                                        <td>
                                            <a href="{{route('edit-data.siswa')}}" class="btn btn-secondary btn-sm">Edit</a>
                                            <button type="submit" class="btn btn-secondary btn-sm">Hapus</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection