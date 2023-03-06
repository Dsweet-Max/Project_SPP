@extends('layout.app')
@section('content')
<title> Tambah Data Pembayaran</title>
      <!-- START FORM -->
      <form action='{{ url('pembayaran')}}' method='post'>
        @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href="{{ url('pembayaran')}}" class="btn btn-secondary"> kembali </a>
            <div class="mb-3 row">
                <label for="id_pembayaran" class="col-sm-2 col-form-label">Id Pembayaran</label>
                <div class="col-sm-10">
                    <input autofocus type="text" class="form-control" name='id_pembayaran' value="{{ Session::get('id_pembayaran')}}" id="id_pembayaran">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="id_petugas" class="col-sm-2 col-form-label">Id Petugas</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='id_petugas' id="id_petugas" value="{{ old('id_petugas')}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="id_siswa" class="col-sm-2 col-form-label">Id siswa</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='id_siswa' id="id_siswa"value="{{ old('id_siswa')}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tgl_bayar" class="col-sm-2 col-form-label">Tanggal Bayar</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name='tgl_bayar' id="tgl_bayar" value="{{ old('tgl_bayar')}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="bulan_dibayar" class="col-sm-2 col-form-label">Bulan Dibayar</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='bulan_dibayar' id="bulan_dibayar"value="{{ old('bulan_dibayar')}}">
                </div>
            </div>
            <div class="mb-3 row">
                    <label for="tahun_dibayar" class="col-sm-2 col-form-label">Tahun Dibayar</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='tahun_dibayar' id="tahun_dibayar" value="{{ old('tahun_dibayar')}}">
                    </div>
            </div>
            <div class="mb-3 row">
                <label for="id_spp" class="col-sm-2 col-form-label">Id SPP</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='id_spp' id='id_spp' value=" {{ old('id_spp') }}">
                </div>
            </div>
            <div class="mb-3 row">
                    <label for="jumlah_bayar" class="col-sm-2 col-form-label">Jumlah Bayar</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='jumlah_bayar' id="jumlah_bayar" value=" {{ old('jumlah_bayar') }}">
                    </div>
            </div>
            <div class="mb-3 row">
               
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
            </div>
          </form>
        </div>
        <!-- AKHIR FORM -->
@endsection