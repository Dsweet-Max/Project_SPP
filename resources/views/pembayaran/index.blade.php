@extends('layout.app')
@section('content')
    <title> Data Siswa</title>
       <!-- START DATA -->
       <div class="my-3 p-3 bg-body rounded shadow-sm">
        <!-- FORM PENCARIAN -->
        <div class="pb-3">
          <form class="d-flex" action="{{ url('pembayaran')}}" method="get">
              <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
              <button class="btn btn-secondary" type="submit">Cari</button>
          </form>
        </div>
        
        <!-- TOMBOL TAMBAH DATA -->
        <div class="pb-3">
          <a href='{{url('pembayaran/create')}}' class="btn btn-primary">+ Tambah Data</a>
        </div>
  
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-2">Id Pembayaran</th>
                    <th class="col-md-3">Id Petugas</th>
                    <th class="col-md-3">Id Siswa</th>
                    <th class="col-md-2">Tanggal Bayar</th>
                    <th class="col-md-2">Bulan Dibayar</th>
                    <th class="col-md-2">Tahun Dibayar</th>
                    <th class="col-md-2">Id Spp</th>
                    <th class="col-md-2">Jumlah Bayar</th>
                    <th class="col-md-2">Status</th>
                    <th class="col-md-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = $data->firstItem() ?>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $item->id_pembayaran}}</td>
                    <td>{{ $item->id_petugas }}</td>
                    <td>{{ $item->id_siswa }}</td>
                    <td>{{ $item->tgl_bayar }}</td>
                    <td>{{ $item->bulan_dibayar }}</td>
                    <td>{{ $item->tahun_dibayar }}</td>
                    <td>{{ $item->id_spp }}</td>
                    <td>Rp.{{ number_format($item->jumlah_bayar) }}</td>
                    <td><button>selesai</button> </td>
        
                    <td>
                        <a href='{{ url('pembayaran/'.$item->id_pembayaran. '/edit')}}' class="btn btn-warning btn-sm mb-2">Edit</a>
                        <form onsubmit="return confirm('Yakin akan menghapus data?')" class="d-inline" action="{{ url('pembayaran/'.$item->id_pembayaran)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                        </form>
                    </td>
                </tr>
                <?php $i++ ?>
                @endforeach
            </tbody>
        </table>
        {{ $data->withQueryString()->links()}}
       
  </div>
  <!-- AKHIR DATA -->
@endsection
     