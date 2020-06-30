<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;
use App\Admin;
use App\Http\Controllers\Admin\Products;
use App\Policies\ProductsPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         'App\Model' => 'App\Policies\ModelPolicy',
         Products::class => ProductsPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('products', function(Admin $admin){
            return true;
            //return $admin->id > 0 ? Response::allow() : Response::deny('You are not James Makuu!');
        });
        /* Gate::before(function(Admin $admin){
            return $admin->id > 0 ? Response::allow() : Response::deny('This takes priority over other Gates! Admin ID=1 blocked!');
        }); */
    }
}
