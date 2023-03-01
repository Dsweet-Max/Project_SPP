@extends('layout.app')
@section('content')
<title> Edit Data Siswa</title>
      <!-- START FORM -->
      <form action='{{ url('siswa/' .$data->nis) }}' method='post'>
      @csrf
        @method('PUT')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href="{{ url('siswa')}}" class="btn btn-secondary"> kembali </a>
            <div class="mb-3 row">
                <label for="nis" class="col-sm-2 col-form-label">NIS</label>
                <div class="col-sm-10">
                    {{ $data->nis }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='name' id="name" value=" {{ $data->name }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Kelas</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='id_kelas' id="id_kelas" value=" {{ $data->id_kelas }}">
                </div>
            </div>
            <div class="mb-3 row">
                    <label for="nim" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='alamat' id="alamat" value=" {{ $data->alamat }}">
                    </div>
            </div>
            <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">No Telepon</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='no_telp' id="no_telp" value=" {{ $data->no_telp }}">
                    </div>
            </div>
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label">Id SPP</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='id_spp' id='id_spp' value=" {{ $data->id_spp }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
            </div>
          </form>
        </div>
        <!-- AKHIR FORM -->
@endsection
   