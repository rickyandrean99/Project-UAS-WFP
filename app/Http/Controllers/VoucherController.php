<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Voucher;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Voucher::all();
        return view('pegawai.voucher',compact('query'));
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
        try {
            $this->authorize('cekpegawai');

            $data = new Voucher();
            $data->kode = $request->get('kdVoucher');
            $data->discount = $request->get('discVoucher');

            $data->save();
            return redirect()->route('voucher.index')->with('status','Voucher berhasil ditambahkan'); 
        } catch (\Throwable $th) {
            return redirect()->route('voucher.index')->with('error','Voucher gagal ditambahkan, silahkan mencoba kembali'); 
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
    public function update(Request $request, Voucher $voucher)
    {
        $this->authorize('cekpegawai');
        try {
            $voucher->kode = $request->get('kdVoucher');
            $voucher->discount = $request->get('discVoucher');

            $voucher->save();
            return redirect()->route('voucher.index')->with('status','Voucher berhasil diubah'); 
        } catch (\PDOException $e) {
            return redirect()->route('voucher.index')->with('error','Voucher gagal diubah, silahkan mencoba kembali'); 
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

    public function getData(Request $request){
        $this->authorize('cekpegawai');
        $msg='';
        try {
            $id = $request->get('id');
            $voucher = Voucher::find($id);
            return response()->json(array(
                'msg'=> view('pegawai.voucherEdit',compact('voucher'))->render()
            ),200);
        } catch (\PDOException $e) {
            $msg="Gagal mendapatkan data voucher, silahkan mencoba kembali";
            return response()->json(array(
                'msg'=> $msg
            ),200);
        }
        
    }

    public function dltVoucher(Request $request){
        $this->authorize('cekpegawai');
        try {
            $id = $request->get('id');
            $voucher = Voucher::find($id);
            $voucher->delete();
            return response()->json(array(
                'status'=>'ok'
            ),200);
        } catch (\Throwable $th) {
            return response()->json(array(
                'status'=>'error'
            ),200);
        }

    }
}
