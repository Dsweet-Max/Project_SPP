@extends('layout.app')
@section('content')
    <title> Data Siswa</title>
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
          <a href='{{url('siswa/create')}}' class="btn btn-primary">+ Tambah Data</a>
        </div>
  
        <table class="pb-3 table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-2">Id Siswa</th>
                    <th class="col-md-2">NIS</th>
                    <th class="col-md-3">Nama</th>
                    <th class="col-md-2">Kelas</th>
                    <th class="col-md-2">Alamat</th>
                    <th class="col-md-2">No Telpon</th>
                    <th class="col-md-2">Id Spp</th>
                    <th class="col-md-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = $data->firstItem() ?>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $item->id_siswa }}</td>
                    <td>{{ $item->nis }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->kelas->nama_kelas }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->no_telp }}</td>
                    <td>{{ $item->id_spp }}</td>
                    <td>
                        <a href='{{ url('siswa/'.$item->id_siswa. '/edit')}}' class="btn btn-warning btn-sm mb-2">Edit</a>
                        <form onsubmit="return confirm('Yakin akan menghapus data?')" class="d-inline" action="{{ url('siswa/'.$item->id_siswa)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" name="submit" class="btn btn-danger btn-sm mb-2">Del</button>
                        </form>
                        <a href="{{route('print.show', $item->id_siswa)}}"class="btn btn-primary btn-sm"> Print</a>
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
     