<?php

namespace App\Http\Controllers;

use App\Models\petugas;
use Illuminate\Http\Request;
use SebastianBergmann\Template\Template;
use Illuminate\Support\Facades\Session;

class PetugasController extends Controller
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
            $data = Petugas::where('id_pembayaran', 'like', "%$katakunci%")
                ->orWhere('username', 'like', "%$katakunci%")
                ->orWhere('nama_petugas', 'like', "%$katakunci%")
                ->orWhere('level', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);             
        } else {
            $data = petugas::orderBy('id_petugas', 'desc')->paginate($jumlahbaris);
        }
        return view('petugas.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('petugas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        session::flash('id_petugas', $request->id_petugas);
        
        $request->validate([
            'id_petugas'=> 'required|unique:petugas,id_petugas',
            'username'=> 'required',
            'password'=> 'required',
            'nama_petugas'=> 'required',
            'level'=> 'required',
        ],
        [
            'id_petugas.unique' => 'id petugas tidak boleh sama',
            'id_petugas.required' => 'id petugas tidak boleh kosong',
            'username.required' => 'Username tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
            'nama_petugas.required' => 'Nama Petugas tidak boleh kosong',
            'level.required' => 'level tidak boleh kosong',
        ] 
        );
        $data = [
            'id_petugas'=>$request->id_petugas,
            'username'=>$request->username,
            'password'=>$request->password,
            'nama_petugas'=>$request->nama_petugas,
            'level'=>$request->level,
        ];
        petugas::create($data);
        return redirect()->to('petugas')->with('success', 'Berhasil menambahkan data');
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
        $data = petugas::where('id_petugas', $id)->first();
        return view('petugas.edit')->with('data', $data);
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
            'username'=> 'required',
            'password'=> 'required',
            'nama_petugas'=> 'required',
            'level'=> 'required',
        ],
        [
            'username.required' => 'Username tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
            'nama_petugas.required' => 'Nama Petugas tidak boleh kosong',
            'level.required' => 'level tidak boleh kosong',
        ] 
        );
        $data = [
            'username'=>$request->username,
            'password'=>$request->password,
            'nama_petugas'=>$request->nama_petugas,
            'level'=>$request->level,
        ];
        petugas::where('id_petugas', $id)->update($data);
        return redirect()->to('petugas')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       petugas::where('id_petugas', $id)->delete();
        return redirect()->to('petugas')->with('success', 'Berhasil melakukan delete data');
    }
}
