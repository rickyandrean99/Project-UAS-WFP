<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class AksesPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function cekmember(User $user) {
        return ($user->sebagai == 'member' && $user->active
            ? Response::allow()
            : Response::deny('Anda harus daftar sebagai member terlebih dahulu.')
        );
    }

    public function cekadmin(User $user) {
        return($user->sebagai == 'admin' && $user->active
            ? Response::allow()
            : Response::deny('Hanya dapat diakses oleh Admin.')
        );
    }

    public function cekpegawai(User $user) {
        return($user->sebagai == 'admin' || $user->sebagai == 'pegawai' && $user->active
            ? Response::allow()
            : Response::deny('Hanya dapat diakses oleh Admin atau Pegawai yang tidak sedang disuspend.')
        );
    }
}
