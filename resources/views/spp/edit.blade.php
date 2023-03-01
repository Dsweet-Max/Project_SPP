@extends('layout.app')
@section('content')

      <!-- START FORM -->
      <form action='{{ url('spp/' .$data->id_spp) }}' method='post'>
      @csrf
        @method('PUT')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href="{{ url('spp')}}" class="btn btn-secondary"> kembali </a>
            <div class="mb-3 row">
                <label for="nis" class="col-sm-2 col-form-label">id spp</label>
                <div class="col-sm-10">
                    {{ $data->id_spp }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='tahun' id="tahun" value=" {{ $data->tahun }}">
                </div>
            </div>
            <div class="mb-3 row">
                    <label for="tahun" class="col-sm-2 col-form-label">Nominal</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='nominal' id="nominal" value=" {{ $data->nominal}}">
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
   