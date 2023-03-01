<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SppController extends Controller
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
            $data = spp::where('id_spp', 'like', "%$katakunci%")
                ->orWhere('tahun', 'like', "%$katakunci%")
                ->orWhere('nominal', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);             
        } else {
            $data = spp::orderBy('id_spp', 'desc')->paginate($jumlahbaris);
        }
        return view('spp.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('spp.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        session::flash('id_spp', $request->id_spp);
        
        $request->validate([
            'id_spp'=> 'required',
            'tahun'=> 'required',
            'nominal'=> 'required',
        ],           
        [
            'id_spp.required' => 'Id spp tidak boleh kosong',
            'tahun.required' => 'Tahun tidak boleh kosong',
            'nominal.required' => 'Nominal keahlian tidak boleh kosong',
        ] 
        );
        $data = [
            'id_spp'=>$request->id_spp,
            'tahun'=>$request->tahun,
            'nominal'=>$request->nominal,
        ];
        spp::create($data);
        return redirect()->to('spp')->with('success', 'Berhasil menambahkan data');
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
        $data = spp::where('id_spp', $id)->first();
        return view('spp.edit')->with('data', $data);
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
            'tahun'=> 'required',
            'nominal'=> 'required',
        ],
        [
            'tahun.required' => 'tahun tidak boleh kosong',
            'nominal.required' => 'nominal tidak boleh kosong',
        ]);
        $data = [
            'tahun'=>$request->tahun,
            'nominal'=>$request->nominal,
        ];

        spp::where('id_spp', $id)->update($data);
        return redirect()->to('spp')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        spp::where('id_spp', $id)->delete();
        return redirect()->to('spp')->with('success', 'Berhasil melakukan delete data');
    }
}