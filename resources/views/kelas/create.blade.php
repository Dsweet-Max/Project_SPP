@extends('layout.app')
@section('content')
      <!-- START FORM -->
      <form action='{{ url('kelas')}}' method='post'>
      @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href="{{ url('kelas')}}" class="btn btn-secondary"> kembali </a>
            <div class="mb-3 row">
                <label for="id_kelas" class="col-sm-2 col-form-label">id kelas</label>
                <div class="col-sm-10">
                    <input autofocus type="text" class="form-control" name='id_kelas' value="{{ Session::get('id_kelas')}}" id="id_kelas">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama_kelas" class="col-sm-2 col-form-label">Nama kelas</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama_kelas' id="nama_kelas" value="{{ old('nama kelas')}}">
                </div>
            </div>
            <div class="mb-3 row">
                    <label for="kompetensi_keahlian" class="col-sm-2 col-form-label">kompetensi keahlian</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='kompetensi_keahlian' id="kompetensi_keahlian" value="{{ old('Kompetensi keahlian')}}">
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
   