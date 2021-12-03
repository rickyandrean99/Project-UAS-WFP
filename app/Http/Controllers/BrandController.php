<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Produk;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Brand::all();
        
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
        $nama = $request->get('nmBrand');
        $nama_file = '';
        if($request->hasFile('ftBrand')){
            $foto = $request->file("ftBrand");
            $ext =$foto->getClientOriginalExtension();
            $nama_file = $request->get('nmBrand').'.'.$ext;
            $foto->move('images/logo',$nama_file);
        }

        $data           = new Brand();
        $data->nama     = $nama;
        $data->foto     = $nama_file;
        $data->save();
        return redirect()->route('brand.index')->with('status','Data brand berhasil ditambahkan'); 
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
        $nama = $request->get('nmBrand');
        $hidenFoto = $request->get('hidden-foto');
        $nama_file = $request->get('hidden-foto');
        if($request->hasFile('ftBrand')){
            $foto = $request->file("ftBrand");
            $ext =$foto->getClientOriginalExtension();
            $nama_file = $request->get('nmBrand').'.'.$ext;
            $foto->move('images/logo',$nama_file);
        }
        $brand->nama = $nama;
        $brand->foto = $nama_file;
        $brand->save();
        return redirect()->route('brand.index')->with('status','Data brand berhasil diubah');
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

    public function getData(Request $request){
        $id = $request->get('id');
        $data = Brand::find($id);
        return response()->json(array(
            'msg'=> view('pegawai.brandEdit',compact('data'))->render()
        ),200);
    }


}
