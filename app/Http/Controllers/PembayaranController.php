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
        session::flash('nis', $request->nis);
        
        $request->validate([
            'nis'=> 'required|numeric|unique:Pembayaran,nis',
            'name'=> 'required',
            'id_kelas'=> 'required',
            'alamat'=> 'required',
            'no_telp'=> 'required',
            'id_spp'=> 'required',
        ],
        [
            'nis.unique' => 'NIS tidak boleh sama',
            'nis.required' => 'NIS tidak boleh kosong',
            'name.required' => 'Nama tidak boleh kosong',
            'id_kelas.required' => 'id kelas tidak boleh kosong',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'no_telp.required' => 'No Telepon tidak boleh kosong',
            'id_spp.required' => 'id spp tidak boleh kosong',
        ] 
        );
        $data = [
            'nis'=>$request->nis,
            'name'=>$request->name,
            'id_kelas'=>$request->id_kelas,
            'alamat'=>$request->alamat,
            'no_telp'=>$request->no_telp,
            'id_spp'=>$request->id_spp,
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
        $data = pembayaran::where('nis', $id)->first();
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
            'name'=> 'required',
            'id_kelas'=> 'required',
            'alamat'=> 'required',
            'no_telp'=> 'required',
            'id_spp'=> 'required',
        ],
        [
            'name.required' => 'Nama tidak boleh kosong',
            'id_kelas.required' => 'id kelas tidak boleh kosong',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'no_telp.required' => 'No Telepon tidak boleh kosong',
            'id_spp.required' => 'id spp tidak boleh kosong',
        ]);
        $data = [
            'name'=>$request->name,
            'id_kelas'=>$request->id_kelas,
            'alamat'=>$request->alamat,
            'no_telp'=>$request->no_telp,
            'id_spp'=>$request->id_spp,
        ];

        pembayaran::where('nis', $id)->update($data);
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
        pembayaran::where('nis', $id)->delete();
        return redirect()->to('pembayaran')->with('success', 'Berhasil melakukan delete data');
    }
}
