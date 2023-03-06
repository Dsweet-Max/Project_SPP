
<table class="pb-3 table table-bordered">
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
        @foreach ($data as $item)
        <tr>
            <td>{{ $loop->iteration  }}</td>
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
                    <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                    <button onclick="prints()"> Print</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<script>
    function prints(){
        window.print();
    }
</script>