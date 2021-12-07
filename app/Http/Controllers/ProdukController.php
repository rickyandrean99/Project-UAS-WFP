<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Brand;
use App\Kategori;
use App\User;
use Auth;
use File;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::paginate(10);
        $brand = Brand::all();
        $kategori = Kategori::all();

        $userRole = null;
        if (isset(Auth::user()->sebagai)) 
            $userRole = Auth::user()->sebagai;

        if ($userRole == 'pegawai' || $userRole =='admin')
            return view('pegawai.produk', compact('produk','brand','kategori'));
        else
            return view('user.produk', compact('produk'));
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
            $nama = $request->get('nmProduk');
            $nama_file = '';
            if($request->hasFile('ftProduk')){
                $foto = $request->file("ftProduk");
                $ext =$foto->getClientOriginalExtension();
                $nama_file = $request->get('nmProduk').'.'.$ext;
            // dd($nama_file);
                $foto->move('images/produk',$nama_file);
            }

            $data = new Produk();
            $data->nama = $nama;
            $data->foto = $nama_file;
            $data->harga = $request->get('hrgProduk');
            $data->spesifikasi = $request->get('spek');
            $data->kategoris_id = $request->get('kategori');
            $data->brands_id = $request->get('brand');

            $data->save();
            return redirect()->route('produk.index')->with('status','Data produk berhasil ditambahkan');
        } catch (\PDOException $e) {
            return redirect()->route('produk.index')->with('error','Data produk gagal ditambahkan, silahkan dicoba kembali');
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
        $produk = Produk::find($id);
        $produk->spesifikasi = explode(";", $produk->spesifikasi);
        $wishlist = count($produk->users);
        $wish_status = false;
        $cart_status = false;

        if (Auth::user()) {
            // cek wishlist
            $user_wishlist = User::find(Auth::user()->id)->produks;
            foreach ($user_wishlist as $uw) {
                if ($uw->id == $id) {
                    $wish_status = true;
                    break;
                }
            }

            // cek keranjang
            $cart_status = (isset(session()->get('keranjang')[$id]))? true : false;
        } 
        
        return view('user.detailproduk', compact('produk', 'wishlist', 'wish_status', 'cart_status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $this->authorize('cekpegawai');
        try {
            $nama = $request->get('nmProduk');
            $nama_file = '';
            $hiddenFoto = $request->get('hidden-foto');
            if($request->hasFile('ftProduk')){
                $foto = $request->file("ftProduk");
                $ext =$foto->getClientOriginalExtension();
                $nama_file = $nama.'.'.$ext;
                File::delete(public_path('images/produk/'.$hiddenFoto));
                $foto->move('images/produk',$nama_file);
                $produk->foto = $nama_file;
            }
            
            $produk->nama = $nama;
            $produk->harga = $request->get('hrgProduk');
            $produk->spesifikasi = $request->get('spek');
            $produk->kategoris_id = $request->get('kategori');
            $produk->brands_id = $request->get('brand');

            $produk->save();
            return redirect()->route('produk.index')->with('status','Data produk berhasil diubah');
        } catch (\PDOException $e) {
            return redirect()->route('produk.index')->with('error','Data produk gagal diubah, silahkan mencoba kembali');
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

    public function bandingProduk() {
        if(Auth::user())
            return view('user.perbandingan');
    }

    public function getData(Request $request) {
        $this->authorize('cekpegawai');
        try {
            $id = $request->get('id');
            $produk = Produk::find($id);
            $brand = Brand::all();
            $kategori = Kategori::all();
            return response()->json(array(
                'msg'=> view('pegawai.produkEdit',compact('produk','brand','kategori'))->render()
            ),200);
        } catch (\PDOException $e) {
            return response()->json(array(
                'msg'=> "gagal mendapatkan data produk, silahkan mencoba kembali9"
            ),200);
        }
        
    }

    public function perbandinganTipe(Request $request) {
        $tipe = $request->get('tipe');
        $produk = Kategori::find($tipe)->produks;

        return response()->json(array(
            'produk' => $produk
        ),200); 
    }

    public function perbandinganProduk(Request $request) {
        $produk = Produk::find($request->get("id"));

        return response()->json(array(
            'produk' => $produk
        ),200);
    }

    public function deletData(Request $request){
        $this->authorize('cekpegawai');
        try {
            $id = $request->get('id');
            $produk = Produk::find($id);
            $produk->delete();
            return response()->json(array(
                'status'=>'ok'
            ),200);
        } catch (\PDOException $e) {
            return response()->json(array(
                'status'=>'error'
            ),200);
        }
        
    }

    public function detail(Request $request){
        $this->authorize('cekpegawai');
        try {
            $id = $request->get('id');
            $produk = Produk::find($id);
            $produk->spesifikasi = explode(";", $produk->spesifikasi);
            $wishlist = count($produk->users);
            return response()->json(array(
                'msg'=> view('pegawai.produkDetail',compact('produk','wishlist'))->render()
            ),200);
        } catch (\PDOException $e) {
            return response()->json(array(
                'msg'=> "gagal mendapat detail produk, silahkan mencoba kembali."
            ),200);
        }
        
    }

    public function keranjang() {
        return view("user.keranjang");
    }

    public function tambahHapusKeranjang(Request $request) {
        $tipe = $request->get("tipe");
        
        if ($tipe == "tambah" || $tipe == "hapus") {
            $id = $request->get("id");
            $jumlah = $request->get("jumlah");
            $produk = Produk::find($id);
            $keranjang = session()->get('keranjang');

            if ($tipe == "tambah") {
                $keranjang[$id] = [
                    "nama" => $produk->nama,
                    "foto" => $produk->foto,
                    "harga" => $produk->harga,
                    "kuantitas" => $jumlah,
                ];
            } else if ($tipe == "hapus") {
                unset($keranjang[$id]);
            }

            session()->put('keranjang', $keranjang);
            return response()->json(array(
                'result'=> 'sukses'
            ),200);
        } 

        return response()->json(array(
            'result'=> 'gagal'
        ),200);
    }

    public function ubahKeranjang(Request $request) {
        $list_id = $request->get("listId");
        $list_kuantitas = $request->get("listKuantitas");
        $keranjang = session()->get('keranjang');
        
        foreach($list_id as $idx => $id) {
            $keranjang[$id]["kuantitas"] = $list_kuantitas[$idx];
        }

        session()->put('keranjang', $keranjang);

        return response()->json(array(
            'result'=> 'sukses'
        ),200);
    }
}
