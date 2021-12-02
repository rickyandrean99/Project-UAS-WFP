<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = User::where('sebagai', 'pegawai')->get();
        return view('admin.pegawai',compact('query'));
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
        $pass = $request->get('passPegawai');
        $Repass = $request->get('konfirmasiPass');

        if($pass == $Repass){
            $data = new User();
            $data->name         = $request->get('nmPegawai'); 
            $data->email        = $request->get('emailPegawai'); 
            $data->password     = Hash::make($pass);
            $data->created_at   = Carbon::now();
            $data->updated_at   = Carbon::now();
            $data->sebagai      = "pegawai";
            $data->active       = true;
            $data->save();
            return redirect()->route('pegawai.index')->with('status','Data pegawai berhasil ditambahkan');
        }
        else{
            return redirect()->route('pegawai.index')->with('error','Data pegawai gagal ditambahkan, password tidak sama');
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

    public function suspend(Request $request){
        $id = $request->get('id');
        $pegawai = User::find($id);
        if($pegawai->active == true){
            $pegawai->active = FALSE;
        }
        else {
            $pegawai->active = true;
        }
        
        $pegawai->save();

        return response()->json(array(
            'status'=>'ok'
        ),200);
    }
}
