<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use SebastianBergmann\Template\Template;
use Illuminate\Support\Facades\Session;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        if(strlen($katakunci)){
            $data = Pembayaran::where('id_pembayaran', 'like', "%$katakunci%")
                ->orWhere('id_petugas', 'like', "%$katakunci%")
                ->orWhere('nis', 'like', "%$katakunci%")
                ->orWhere('nama', 'like', "%$katakunci%")
                ->orWhere('tgl_dibayar', 'like', "%$katakunci%")
                ->orWhere('bulan_dibayar', 'like', "%$katakunci%")
                ->orWhere('tahun_dibayar', 'like', "%$katakunci%")
                ->orWhere('id_spp', 'like', "%$katakunci%")
                ->orWhere('jumlah_bayar', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);             
        } else {
            $data = Pembayaran::orderBy('id_pembayaran', 'desc')->paginate($jumlahbaris);
        }
        return view('Pembayaran.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Pembayaran.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        session::flash('id_pembayaran', $request->id_pembayaran);
        
        $request->validate([
            'id_pembayaran'=> 'required|numeric|unique:Pembayaran,id_pembayaran',
            'id_petugas'=> 'required',
            'id_siswa'=> 'required',
            'tgl_bayar'=> 'required',
            'bulan_dibayar'=> 'required',
            'tahun_dibayar'=> 'required',
            'id_spp'=> 'required',
            'jumlah_bayar'=> 'required',
        ],
        [   
            'id_pembayaran.unique' => 'Id pembayaran tidak boleh sama',
            'id_pembayaran.required' => 'Id pembayaran tidak boleh kosong',
            'id_petugas.required' => 'Id petugas tidak boleh kosong',
            'id_siswa.required' => 'Id siswa tidak boleh kosong',
            'tgl_bayar.required' => 'Tanggal bayar tidak boleh kosong',
            'bulan_dibayar.required' => 'Bulan dibayar tidak boleh kosong',
            'tahun_dibayar.required' => 'Tahun dibayar tidak boleh kosong',
            'id_spp.required' => 'Id spp tidak boleh kosong',
            'jumlah_bayar.required' => 'Jumlah bayar tidak boleh kosong',
        ] 
        );
        $data = [
            'id_pembayaran'=>$request->id_pembayaran,
            'id_petugas'=>$request->id_petugas,
            'id_siswa'=>$request->id_siswa,
            'tgl_bayar'=>$request->tgl_bayar,
            'bulan_dibayar'=>$request->bulan_dibayar,
            'tahun_dibayar'=>$request->tahun_dibayar,
            'id_spp'=>$request->id_spp,
            'jumlah_bayar'=>$request->jumlah_bayar,
        ];
        Pembayaran::create($data);
        return redirect()->to('pembayaran')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = pembayaran::where('id_pembayaran', $id)->first();
        return view('pembayaran.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_petugas'=> 'required',
            'id_siswa'=> 'required',
            'tgl_dibayar'=> 'required',
            'bulan_dibayar'=> 'required',
            'tahun_dibayar'=> 'required',
            'id_spp'=> 'required',
            'jumlah_bayar'=> 'required',
        ],
        [   
            'id_petugas.required' => 'Id petugas tidak boleh kosong',
            'id_siswa.required' => 'Id siswa tidak boleh kosong',
            'tgl_dibayar.required' => 'Tanggal dibayar tidak boleh kosong',
            'bulan_dibayar.required' => 'Bulan dibayar tidak boleh kosong',
            'tahun_dibayar.required' => 'Tahun dibayar tidak boleh kosong',
            'id_spp.required' => 'Id spp tidak boleh kosong',
            'jumlah_bayar.required' => 'Jumlah bayar tidak boleh kosong',
        ] 
        );
        $data = [
            'id_petugas'=>$request->id_petugas,
            'id_siswa'=>$request->id_siswa,
            'tgl_dibayar'=>$request->tgl_dibayar,
            'bulan_dibayar'=>$request->bulan_dibayar,
            'tahun_dibayar'=>$request->tahun_dibayar,
            'id_spp'=>$request->id_spp,
            'jumlah_bayar'=>$request->jumlah_bayar,
        ];

        pembayaran::where('id_pembayaran', $id)->update($data);
        return redirect()->to('pembayaran')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        pembayaran::where('id_pembayaran', $id)->delete();
        return redirect()->to('pembayaran')->with('success', 'Berhasil melakukan delete data');
    }
}
