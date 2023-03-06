@extends('layout.app')
@section('content')
      <!-- START FORM -->
      <form action='{{ url('spp')}}' method='post'>
      @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href="{{ url('spp')}}" class="btn btn-secondary"> kembali </a>
            <div class="mb-3 row">
                <label for="id_spp" class="col-sm-2 col-form-label">id spp</label>
                <div class="col-sm-10">
                    <input autofocus type="text" class="form-control" name='id_spp' value="{{ Session::get('id_spp')}}" id="id_kelas">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='tahun' id="tahun" value="{{ old('tahun')}}">
                </div>
            </div>
            <div class="mb-3 row">
                    <label for="nominal" class="col-sm-2 col-form-label">Nominal</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='nominal' id="nominal" value="{{ old('nominal')}}">
                    </div>
            </div>
            <div class="mb-3 row">
                
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
            </div>
          </form>
        </div>
        <!-- AKHIR FORM -->
@endsection
   