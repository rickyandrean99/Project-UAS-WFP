<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Produk;
use File;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Brand::paginate(10);
        
        return view('pegawai.brand',compact('query'));
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
            $nama = $request->get('nmBrand');
            $nama_file = '';
            if($request->hasFile('ftBrand')){
                $foto = $request->file("ftBrand");
                $ext =$foto->getClientOriginalExtension();
                $nama_file = $request->get('nmBrand').'.'.$ext;
            // dd($nama_file);
                $foto->move('images/logo',$nama_file);
            }

            $data           = new Brand();
            $data->nama     = $nama;
            $data->foto     = $nama_file;
            $data->save();
            return redirect()->route('brand.index')->with('status','Data brand berhasil ditambahkan');
        } catch (\PDOException $e) {
            return redirect()->route('brand.index')->with('error','Data brand gagal ditambahkan, silahkan mencoba kembali');
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
    public function update(Request $request, Brand $brand)
    {
        $this->authorize('cekpegawai');

        try {
            $nama = $request->get('nmBrand');
            $nama_file = '';
            $hiddenFoto = $request->get('hidden-foto');
            if($request->hasFile('ftBrand')){
                $foto = $request->file("ftBrand");
                $ext =$foto->getClientOriginalExtension();
                $nama_file = $request->get('nmBrand').'.'.$ext;
                File::delete(public_path('images/logo/'.$hiddenFoto));
                $foto->move('images/logo',$nama_file);
                $brand->foto = $nama_file;
            }
            $brand->nama = $nama;
            $brand->save();
            return redirect()->route('brand.index')->with('status','Data brand berhasil diubah');
        } catch (\PDOException $e) {
            return redirect()->route('brand.index')->with('error','Data brand gagal diubah, silahkan mencoba kembali');
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

    public function tampilkanBrand($brand) {
        $brand = ucwords(str_replace('-', ' ', $brand));
        $id_brand = Brand::where('nama', $brand)->get()[0]->id;
        $produk = Produk::where('brands_id', $id_brand)->paginate(10);

        return view('user.produk', compact('produk'));
    }

    public function getData(Request $request) {
        $this->authorize('cekpegawai');
        
        try {
            $id = $request->get('id');
            $data = Brand::find($id);
            return response()->json(array(
                'msg'=> view('pegawai.brandEdit',compact('data'))->render()
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
            $brand = Brand::find($id);
            $brand->delete();
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
