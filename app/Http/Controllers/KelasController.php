<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KelasController extends Controller
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
            $data = Kelas::where('id_kelas', 'like', "%$katakunci%")
                ->orWhere('nama_kelas', 'like', "%$katakunci%")
                ->orWhere('kompetensi_keahlian', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);             
        } else {
            $data = Kelas::orderBy('id_kelas', 'desc')->paginate($jumlahbaris);
        }
        return view('kelas.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        session::flash('id_kelas', $request->id_kelas);
        
        $request->validate([
            'id_kelas'=> 'required',
            'nama_kelas'=> 'required',
            'kompetensi_keahlian'=> 'required',
        ],           
        [
            'id_kelas.required' => 'Id kelas tidak boleh kosong',
            'nama_kelas.required' => 'Nama kelas tidak boleh kosong',
            'kompetensi_keahlian.required' => 'Kompetensi keahlian tidak boleh kosong',
        ] 
        );
        $data = [
            'id_kelas'=>$request->id_kelas,
            'nama_kelas'=>$request->nama_kelas,
            'kompetensi_keahlian'=>$request->kompetensi_keahlian,
        ];
        Kelas::create($data);
        return redirect()->to('kelas')->with('success', 'Berhasil menambahkan data');
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
        $data = kelas::where('id_kelas', $id)->first();
        return view('kelas.edit')->with('data', $data);
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
            'nama_kelas'=> 'required',
            'kompetensi_keahlian'=> 'required',
        ],
        [
            'nama_kelas.required' => 'Nama kelas tidak boleh kosong',
            'kompetensi_keahlian.required' => 'Kompetensi keahlian tidak boleh kosong',
        ]);
        $data = [
            'nama_kelas'=>$request->nama_kelas,
            'kompetensi_keahlian'=>$request->kompetensi_keahlian,
        ];

        Kelas::where('id_kelas', $id)->update($data);
        return redirect()->to('kelas')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kelas::where('id_kelas', $id)->delete();
        return redirect()->to('kelas')->with('success', 'Berhasil melakukan delete data');
    }
}