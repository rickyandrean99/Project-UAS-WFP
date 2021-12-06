<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('cekmember', 'App\Policies\AksesPolicy@cekmember');
        Gate::define('cekadmin', 'App\Policies\AksesPolicy@cekadmin');
        Gate::define('cekpegawai', 'App\Policies\AksesPolicy@cekpegawai');
    }
}
