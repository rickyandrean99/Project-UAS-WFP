<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Brand;
use App\Kategori;
use Auth;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $produk = Produk::all()->paginate(10);
        $produk = Produk::paginate(10);
        $brand = Brand::all();
        $kategori = Kategori::all();

        // Disini buat if else
        // jika admin return view adminproduct
        // jika user return view user product.
        // sementara aku return view ke user
        $userRole = Auth::user()->sebagai;
        if($userRole == 'pegawai' || $userRole =='admin'){
            return view('pegawai.produk', compact('produk','brand','kategori'));
        }
        else{
            return view('user.produk', compact('produk'));
        }
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
        $nama = $request->get('nmProduk');
        $nama_file = '';
        if($request->hasFile('ftProduk')){
            $foto = $request->file("ftProduk");
            $ext =$foto->getClientOriginalExtension();
            $nama_file = $request->get('nmProduk').'.'.$ext;
           // dd($nama_file);
            $foto->move('images/produk',$nama_file);
        }

        $data                   = new Produk();
        $data->nama             = $nama;
        $data->foto             = $nama_file;
        $data->harga            = $request->get('hrgProduk');
        $data->spesifikasi      = $request->get('spek');
        $data->like             = '0';
        $data->kategoris_id     = $request->get('kategori');
        $data->brands_id        = $request->get('brand');

        $data->save();  
        return redirect()->route('produk.index')->with('status','Data produk berhasil ditambahkan'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produk = Produk::find($id);
        $produk->spesifikasi = explode(";", $produk->spesifikasi);

        return view('user.detailproduk', compact('produk'));
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
    public function update(Request $request, $id)
    {
        //
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

    public function bandingProduk() {
        return view('user.perbandingan');
    }
}
