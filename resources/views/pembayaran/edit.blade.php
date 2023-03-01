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
                <label for="id_pembayaran" class="col-sm-2 col-form-label">Id Pembayaran</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='id_pembayaran' id="id_pembayaran" value="{{ $data->id_pembayaran}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="id_petugas" class="col-sm-2 col-form-label">Id Petugas</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='id_petugas' id="id_petugas" value="{{ $data->id_petugas }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nis" class="col-sm-2 col-form-label">NIS</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nis' id="nis" value=" {{ $data->nis }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tgl_bayar" class="col-sm-2 col-form-label">Tanggal Bayar</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name='tgl_bayar' id="tgl_bayar" value=" {{ $data->tgl_bayar}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="bulan_dibayar" class="col-sm-2 col-form-label">Bulan Dibayar</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='bulan_dibayar' id="bulan_dibayar" value=" {{ $data->bulan_dibayar }}">
                </div>
            </div>
            <div class="mb-3 row">
                    <label for="tahun_dibayar" class="col-sm-2 col-form-label">Tahun Dibayar</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='tahun_dibayar' id="tahun_dibayar" value=" {{ $data->alamat }}">
                    </div>
            </div>
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label">Id SPP</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='id_spp' id='id_spp' value=" {{ $data->id_spp }}">
                </div>
            </div>
            <div class="mb-3 row">
                    <label for="jumlah_bayar" class="col-sm-2 col-form-label">Jumlah Bayar</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='jumlah_bayar' id="jumlah_bayar" value=" {{ $data->jumlah_bayar }}">
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
   