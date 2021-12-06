<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Auth\Access\Response;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo() 
    {
        $role = Auth::user()->sebagai;

        if(Auth::user()->active) {
            session()->forget('status');

            switch($role) {
                case 'admin':
                    return '/dashboard';
                    break;
                
                case 'pegawai':
                    return '/dashboard';
                    break;
    
                case 'member':
                    return '/';
                    break;
    
                default:
                    return '/';
                    break;
            }
        } else {
            session()->put('status', 'Akun anda sedang disuspend. Silahkan minta admin untuk membuka kembali. Harap Logout terlebih dahulu setelah status diubah oleh Admin.');
            return '/home';
        }
    }
}
