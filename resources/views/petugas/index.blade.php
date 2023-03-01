@extends('layout.app')
@section('content')
    <title> Data Petugas</title>
       <!-- START DATA -->
       <div class="my-3 p-3 bg-body rounded shadow-sm">
        <!-- FORM PENCARIAN -->
        <div class="pb-3">
          <form class="d-flex" action="{{ url('siswa')}}" method="get">
              <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
              <button class="btn btn-secondary" type="submit">Cari</button>
          </form>
        </div>
        
        <!-- TOMBOL TAMBAH DATA -->
        <div class="pb-3">
          <a href='{{url('petugas/create')}}' class="btn btn-primary">+ Tambah Data</a>
        </div>
  
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-2">Id Petugas</th>
                    <th class="col-md-3">Username</th>
                    <th class="col-md-2">Password</th>
                    <th class="col-md-2">Nama Petugas</th>
                    <th class="col-md-2">Level</th>
                    <th class="col-md-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = $data->firstItem() ?>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $item->id_petugas}}</td>
                    <td>{{ $item->username}}</td>
                    <td>{{ $item->password }}</td>
                    <td>{{ $item->nama_petugas }}</td>
                    <td>{{ $item->level }}</td>
                    <td>
                        <a href='{{ url('petugas/'.$item->id_petugas. '/edit')}}' class="btn btn-warning btn-sm mb-2">Edit</a>
                        <form onsubmit="return confirm('Yakin akan menghapus data?')" class="d-inline" action="{{ url('petugas/'.$item->id_petugas)}}" method="post">
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
     