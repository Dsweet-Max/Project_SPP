@extends('layout.app')
@section('content')
<title> Edit Data Petugas</title>
      <!-- START FORM -->
      <form action='{{ url('Petugas/' .$data->id_petugas) }}' method='post'>
      @csrf
        @method('PUT')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href="{{ url('Petugas')}}" class="btn btn-secondary"> kembali </a>
            <div class="mb-3 row">
                <label for="id_petugas" class="col-sm-2 col-form-label">Id Petugas</label>
                <div class="col-sm-10">
                    {{ $data->id_petugas }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="username" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='username' id="username" value=" {{ $data->username }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='password' id="password" value=" {{ $data->password }}">
                </div>
            </div>
            <div class="mb-3 row">
                    <label for="nama_petugas" class="col-sm-2 col-form-label">Nama Petugas</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='nama_petugas' id="nama_petugas" value=" {{ $data->nama_petugas }}">
                    </div>
            </div>
            <div class="mb-3 row">
                <label for="level" class="col-sm-2 col-form-label">Level</label>
                <div class="col-sm-10">
                    {{-- <input type="text" class="form-control" name='level' id="level" value="{{ old('level')}}"> --}}
                    <select class="form-select" name='level' id='level'>
                        <option selected>Pilih Level</option>
                        <option value="1">Administrator</option>
                        <option value="2">Petugas</option>
                      </select>
                </div>
        </div>
            <div class="mb-3 row">
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
            </div>
          </form>
        </div>
        <!-- AKHIR FORM -->
@endsection
   