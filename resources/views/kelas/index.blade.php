@extends('layout.app')
@section('content')
    <title> Data Kelas</title>
       <!-- START DATA -->
       <div class="my-3 p-3 bg-body rounded shadow-sm">
        <!-- FORM PENCARIAN -->
        <div class="pb-3">
          <form class="d-flex" action="{{ url('kelas')}}" method="get">
              <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
              <button class="btn btn-secondary" type="submit">Cari</button>
          </form>
        </div>
        
        <!-- TOMBOL TAMBAH DATA -->
        <div class="pb-3">
          <a href='{{url('kelas/create')}}' class="btn btn-primary">+ Tambah Data</a>
        </div>
  
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-2">Id Kelas</th>
                    <th class="col-md-2">Nama kelas</th>
                    <th class="col-md-2">Kompetensi keahlian</th>
                    <th class="col-md-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = $data->firstItem() ?>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $item->id_kelas }}</td>
                    <td>{{ $item->nama_kelas }}</td>
                    <td>{{ $item->kompetensi_keahlian }}</td>
                    <td>
                        <a href='{{ url('kelas/'.$item->id_kelas. '/edit')}}' class="btn btn-warning btn-sm ">Edit</a>
                        <form onsubmit="return confirm('Yakin akan menghapus data?')" class="d-inline" action="{{ url('kelas/'.$item->id_kelas)}}" method="post">
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
     