@extends('layout.app')
@section('content')
<title>Create Data Siswa</title>
      <!-- START FORM -->
      <form action='{{ url('siswa')}}' method='post'>
      @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href="{{ url('siswa')}}" class="btn btn-secondary"> kembali </a>
        </div>
        <div class="mb-3 row">
            <label for="id_siswa" class="col-sm-2 col-form-label">Id Siswa</label>
            <div class="col-sm-10 mb-3">
                <input autofocus type="text" class="form-control" name='id_siswa' value="{{ Session::get('id_siswa')}}"  id="id_siswa">
            </div>
            <div class="mb-3 row">
                <label for="nis" class="col-sm-2 col-form-label">NIS</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='nis' id="nis" value="{{ old('nis')}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='name' id="name" value="{{ old('name')}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                <div class="col-sm-10">
                    <select class="form-select" name='id_kelas' id="id_kelas"> 
                        <option selected>--Pilih kelas--</option>
                        @foreach ($data as $i)
                        <option value="{{$i->id_kelas}}">{{ $i->nama_kelas }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="8" name='alamat' id="alamat">{{ old('alamat')}}</textarea>
                    </div>
            </div>
            <div class="mb-3 row">
                    <label for="no_telp" class="col-sm-2 col-form-label">No Telepon</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='no_telp' id="no_telp" value="{{ old('no_telp')}}">
                    </div>
            </div>
            <div class="mb-3 row">
                <label for="id_spp" class="col-sm-2 col-form-label">Id SPP</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='id_spp' id='id_spp' value="{{ old('id_spp')}}">
                </div>
            </div>
            <div class="mb-3 row">
                
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
            </div>
          </form>
        </div>
        <!-- AKHIR FORM -->
@endsection
   