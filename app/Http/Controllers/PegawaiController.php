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
            try {
                $request->validate([
                    'passPegawai' => ['required', 'string','min:8'],
                    'email'=> ['required','string', 'email', 'max:255', 'unique:users']
                ],
                [
                    'passPegawai.min'   => 'Data pegawai gagal ditambahkan, password minimal 6 karakter',
                    'email.email' => 'Data pegawai gagal ditambahkan, email salah'
                ]
                );
        
                $pass = $request->get('passPegawai');
                $Repass = $request->get('konfirmasiPass');
                
        
                if($pass == $Repass){
                    $data = new User();
                    $data->name         = $request->get('nmPegawai'); 
                    $data->email        = $request->get('email'); 
                    $data->password     = Hash::make($pass);
                    $data->sebagai      = "pegawai";
                    $data->active       = true;
                    $data->save();
                    return redirect()->route('pegawai.index')->with('status','Data pegawai berhasil ditambahkan');
                }
                else{
                    return redirect()->route('pegawai.index')->with('error','Data pegawai gagal ditambahkan, password tidak sama');
                }
            } catch (\PDOException $e) {
                return redirect()->route('pegawai.index')->with('error','Data pegawai gagal ditambahkan, silahkan mencoba kembali');
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
        try {
            $id = $request->get('id');
            $active = "";
            $pegawai = User::find($id);
            if($pegawai->active == true){
                $pegawai->active = FALSE;
                $active = "Suspend";
            }
            else {
                $pegawai->active = true;
                $active = "Active";
            }
            $pegawai->save();
            

            return response()->json(array(
                'status'=>'ok',
                'act' => $active
            ),200);
        } catch (\PDOException $e) {
            return response()->json(array(
                'status'=>'error'
            ),200);
        }
        
    }

    public function resetPass(Request $request){
        $msg = "";
        try {
            $id = $request->get('id');
            $pass = $request->get('pass');
            $rePass = $request->get('rePass');
            if(strlen($pass) >= 8){
                if($pass == $rePass){
                    $pegawai = User::find($id);
                    $pegawai->password = Hash::make($pass);
                    $pegawai->save();
                    $msg = "Password pegawai berhasil diubah";
                }
                else{
                    $msg = "Password pegawai gagal diubah, password tidak sama";
                }
            }
            else{
                $msg = "Password pegawai gagal diubah, password minimal 6 karakter";
            }
            
            return response()->json(array(
                'msg' => $msg
            ),200);
        } catch (\PDOException $e) {
            $msg ="Password pegawai gagal diubah, silahkan mencoba kembali";
            return response()->json(array(
                'msg' => $msg
            ),200);
        }
        
    }
}
