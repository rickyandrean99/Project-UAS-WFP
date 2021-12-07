<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use Carbon\Carbon;
use Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Transaksi::orderBy('status')->paginate(10);
        return view('pegawai.transaksi',compact('query'));
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
        // Cek diskon
        $discount = 0;
        if (session()->get('voucher') != null)
            $discount = intval(session()->get('voucher')[1]);

        // Cek total setelah/tanpa diskon
        $keranjang = session()->get('keranjang');
        $subtotal = 0;
        foreach($keranjang as $k) {
            $subtotal += $k["harga"] * $k["kuantitas"];
        }
        $total = $subtotal * (100 - $discount) / 100;
        
        // Save transaction to database
        $transaksi = new Transaksi();
        $transaksi->tanggal = Carbon::now();
        $transaksi->status = false;
        $transaksi->diskon = $discount;
        $transaksi->total = $total;
        $transaksi->users_id = Auth::user()->id;
        $transaksi->save();
        
        // Save transaction detail to database
        foreach ($keranjang as $id => $value) {
            $transaksi->produks()->attach($id, ['kuantitas' => $value["kuantitas"], 'harga' => $value["harga"]]);
        }
        
        // Set voucher and cart to null
        $value = null;
        session()->put('voucher', $value);
        session()->put('keranjang', $value);

        return redirect()->route('riwayat');
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

    public function confirm(Request $request){
        $msg="";
        try {
            $id = $request->get('id');
            $transaksi = Transaksi::find($id);
            $transaksi->status = true;
            $transaksi->save();
            $msg="Konfirmasi transaksi berhasil";
            return response()->json(array(
                'status'=>'ok',
                'msg' => $msg
            ),200);
        } catch (\PDOException $e) {
            $msg="Konfirmasi transaksi gagal, silahkan mencoba kembali";
            return response()->json(array(
                'status'=>'error',
                'msg' => $msg
            ),200);
        }
        
    }

    public function detail(Request $request){
        $msg="";
        try {
            $id = $request->get('id');
            $transaksi = Transaksi::find($id);
            $produk = $transaksi->produks;
            return response()->json(array(
                'msg'=> view('pegawai.transaksiDetail',compact('transaksi','produk'))->render()
            ),200);

        } catch (\PDOException $e) {
            $msg="Gagal mendapatkan detail produk, silahkan mencoba kembali";
            return response()->json(array(
                'msg'=> $msg
            ),200);
        }
    }

    public function loadCheckout(Request $request) {
        if (session()->get('keranjang') == null)
            return redirect()->back();

        return view("user.checkout");
    }

    public function riwayat() {
        $transaksi = Transaksi::where("users_id", Auth::user()->id)->orderBy('status', 'ASC')->orderBy('tanggal', 'DESC')->get();
        
        return view("user.riwayat", compact('transaksi'));
    }
}
