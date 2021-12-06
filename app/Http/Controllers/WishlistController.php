<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Produk;
use Auth;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::user()->id);
        $produks = $user->produks;

        return view('user.wishlist', compact('produks'));
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
        //
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

    public function addOrRemove(Request $request) {
        $user = User::find(Auth::user()->id);
        $user_wishlist = $user->produks;
        $id_produk = $request->get('id');
        $exist = false;

        foreach ($user_wishlist as $uw) {
            if ($uw->id == $id_produk) {
                $exist = true;
                break;
            }
        }

        if ($exist) {
            $user->produks()->detach($id_produk);
            $result = "remove";
            $amount = -1;
        } else {
            $user->produks()->attach($id_produk);
            $result = "add";
            $amount = 1;
        }
        
        return response()->json(array(
            'result' =>  $result,
            'amount' => $amount
        ), 200);
    }
}
