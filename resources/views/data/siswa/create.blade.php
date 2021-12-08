@extends('layouts.app')

@section('content')

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Tambah Data siswa</li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-body">
            <div class="alert alert-primary" role="alert">
                <h3>Perhatian !!!</h3>
                Silahkan isi data dibawah ini dengan benar.
            </div>

            <form action="{{route('tambah-data.store')}}" method="post">
                @csrf

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">NISN</label>
                            <input type="text" name="nisn" class="form-control" id="" value="NISN">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" name="name" class="form-control" id="" value="User Name">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" id="" value="E-Mail">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Jenis Kelamin</label>
                            <select name="gender" class="form-control" id="">
                                <option value="">Silahkan Pilih Jenis Kelamin</option>
                                <option value="laki-laki">Laki - Laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Agama</label>
                            <select name="religion" class="form-control" id="">
                                <option value="">Silahkan Pilih Agama</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Budha">Budha</option>
                                <option value="Protestan">Protestan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Jurusan</label>
                            <select name="major" class="form-control" id="">
                                <option value="">Silahkan Pilih Jurusan</option>
                                <option value="AK">AK</option>
                                <option value="AP">AP</option>
                                <option value="RPL">RPL</option>
                                <option value="MM">MM</option>
                                <option value="TKJ">TKJ</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Kelas</label>
                            <select name="class" class="form-control" id="">
                                <option value="">Silahkan Pilih kelas</option>
                                <option value="X">X</option>
                                <option value="XI">XI</option>
                                <option value="XII">XII</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Status</label>
                            <select name="status" class="form-control" id="">
                                <option value="">Silahkan Pilih Status</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Non-Aktif">Non-Aktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Akses</label>
                            <select name="roles" class="form-control" id="">
                                <option value="">Silahkan Pilih Akses</option>
                                @foreach ($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control" id="" value="*********">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" name="phone" class="form-control" id="" value="+62">
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
