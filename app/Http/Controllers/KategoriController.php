<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use App\Produk;
use File;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Kategori::all();
        return view('pegawai.kategori',compact('query'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('cekpegawai');
        try {
            $nama = $request->get('nmKategori');
            $nama_file = '';
            if($request->hasFile('ftKategori')){
                $foto = $request->file("ftKategori");
                $ext =$foto->getClientOriginalExtension();
                $nama_file = $request->get('nmKategori').'.'.$ext;
            // dd($nama_file);
                $foto->move('images',$nama_file);
            }

            $data = new Kategori();
            $data->nama = $nama;
            $data->foto = $nama_file;
            $data->save();
            return redirect()->route('kategori.index')->with('status','Data kategori berhasil ditambahkan'); 
        } catch (\PDOException $e) {
            return redirect()->route('kategori.index')->with('error','Data kategori gagal ditambahkan, silahkan mencoba kembali'); 
        }
        
    
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        $this->authorize('cekpegawai');
        try {
            $nama = $request->get('nmKategori');
            $nama_file = '';
            $hiddenFoto = $request->get('hidden-foto');
            if($request->hasFile('ftKategori')){
                $foto = $request->file("ftKategori");
                $ext =$foto->getClientOriginalExtension();
                $nama_file = $request->get('nmKategori').'.'.$ext;
                File::delete(public_path('images/'.$hiddenFoto));
                $foto->move('images',$nama_file);
                $kategori->foto = $nama_file;
            }
            $kategori->nama = $nama;
            $kategori->save();
            return redirect()->route('kategori.index')->with('status','Data kategori berhasil diubah');
        } catch (\PDOException $e) {
            return redirect()->route('kategori.index')->with('error','Data kategori gagal diubah, silahkan mencoba kembali');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function tampilkanKategori($kategori) {
        $kategori = ucwords(str_replace('-', ' ', $kategori));
        $id_kategori = Kategori::where('nama', $kategori)->get()[0]->id;
        $produk = Produk::where('kategoris_id', $id_kategori)->paginate(10);

        return view('user.produk', compact('produk'));
    }

    public function getData(Request $request) {
        $this->authorize('cekpegawai');
        try {
            $id = $request->get('id');
            $data = Kategori::find($id);
            return response()->json(array(
                'msg'=> view('pegawai.kategoriEdit',compact('data'))->render()
            ),200);
        } catch (\PDOException $e) {
            return response()->json(array(
                'msg'=> "gagal mengambil data brand, silahkan mencoba kembali"
            ),200);
        }
        
    }

    public function deletData(Request $request) {
        $this->authorize('cekpegawai');
        try {
            $id = $request->get('id');
            $kategori = Kategori::find($id);
            $kategori->delete();
            return response()->json(array(
                'status'=>'ok'
            ),200);
        } catch (\PDOException $e) {
            return response()->json(array(
                'status'=>'error'
            ),200);
        }
        
    }
}
