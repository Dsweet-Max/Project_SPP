@extends('layout.app')
@section('content')
<title>Create Data Petugas</title>
      <!-- START FORM -->
      <form action='{{ url('petugas')}}' method='post'>
      @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href="{{ url('petugas')}}" class="btn btn-secondary"> kembali </a>
            <div class="mb-3 row">
                <label for="id_petugas" class="col-sm-2 col-form-label">Id petugas</label>
                <div class="col-sm-10">
                    <input autofocus type="text" class="form-control" name='id_petugas' value="{{ Session::get('id_petugas')}}" id="id_petugas">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="username" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='username' id="username" value="{{ old('username')}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='password' id="password" value="{{ old('password')}}">
                </div>
            </div>
            <div class="mb-3 row">
                    <label for="nama_petugas" class="col-sm-2 col-form-label">Nama Petugas</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='nama petugas' id="nama_petugas" value="{{ old('nama petugas')}}">
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
                <label for="jurusan" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
            </div>
          </form>
        </div>
        <!-- AKHIR FORM -->
@endsection
   