<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use SebastianBergmann\Template\Template;
use Illuminate\Support\Facades\Session;

class SiswaController extends Controller
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
            $data = siswa::where('nis', 'like', "%$katakunci%")
                ->orWhere('name', 'like', "%$katakunci%")
                ->orWhere('id_kelas', 'like', "%$katakunci%")
                ->orWhere('alamat', 'like', "%$katakunci%")
                ->orWhere('no_telp', 'like', "%$katakunci%")
                ->orWhere('id_spp', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);             
        } else {
            $data = siswa::orderBy('nis', 'desc')->paginate($jumlahbaris);
        }
        return view('siswa.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Kelas::all();
        return view('siswa.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        session::flash('id_siswa', $request->id_siswa);
        
        $request->validate([
            'id_siswa'=> 'required|unique:siswa,id_siswa',
            'nis'=> 'required|unique:siswa,nis',
            'name'=> 'required',
            'id_kelas'=> 'required',
            'alamat'=> 'required',
            'no_telp'=> 'required',
            'id_spp'=> 'required',
        ],
        [   
            'id_siswa.unique' => 'Id siswa tidak boleh sama',
            'id_siswa.required' => 'Id siswa  tidak boleh kosong',
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
            'id_siswa'=>$request->id_siswa,
            'nis'=>$request->nis,
            'name'=>$request->name,
            'id_kelas'=>$request->id_kelas,
            'alamat'=>$request->alamat,
            'no_telp'=>$request->no_telp,
            'id_spp'=>$request->id_spp,
            
        ];
        Siswa::create($data);
        return redirect()->to('siswa')->with('success', 'Berhasil menambahkan data');
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
        $data = siswa::find($id);
        $kelas = kelas::all();
        return view('siswa.edit', compact('data', 'kelas'));
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
            'nis'=> 'required',
            'name'=> 'required',
            'id_kelas'=> 'required',
            'alamat'=> 'required',
            'no_telp'=> 'required',
            'id_spp'=> 'required',
        ],
        [   
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
        Siswa::where('id_siswa', $id)->update($data);
        return redirect()->to('siswa')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Siswa::where('id_siswa', $id)->delete();
        return redirect()->to('siswa')->with('success', 'Berhasil melakukan delete data');
    }
}
