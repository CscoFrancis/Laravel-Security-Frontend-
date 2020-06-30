<?php

namespace App\Policies;

use App\Products;
use App\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ProductsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the admin can view any models.
     *
     * @param  \App\admin  $admin
     * @return mixed
     */
    public function viewAny(Admin $admin)
    {
        //return $admin->id == 2;
    }

    /**
     * Determine whether the admin can view the model.
     *
     * @param  \App\admin  $admin
     * @param  \App\Products  $products
     * @return mixed
     */
    public function view(Admin $admin)
    {
        //return true;
        //return $admin->id == 1;
        return $admin->id === 1 ? true : false;
        //return $admin->id === 1 ? Response::allow() : Response::deny('You cannot view Products');
    }

    /**
     * Determine whether the admin can create models.
     *
     * @param  \App\admin  $admin
     * @return mixed
     */
    public function create(Admin $admin)
    {
        //return true;
        return $admin->id === 1 ? true : false;
        //return $admin->id == 2;, $product = null 
        //return $admin->id == 1 ? Response::allow() : Response::deny('Creating Products Not authorized');
    }

    /**
     * Determine whether the admin can update the model.
     *
     * @param  \App\admin  $admin
     * @param  \App\Products  $products
     * @return mixed
     */
    public function update(Admin $admin)
    {
        //
    }

    /**
     * Determine whether the admin can delete the model.
     *
     * @param  \App\admin  $admin
     * @param  \App\Products  $products
     * @return mixed
     */
    public function delete(Admin $admin)
    {
        //
    }

    /**
     * Determine whether the admin can restore the model.
     *
     * @param  \App\admin  $admin
     * @param  \App\Products  $products
     * @return mixed
     */
    public function restore(Admin $admin)
    {
        //
    }

    /**
     * Determine whether the admin can permanently delete the model.
     *
     * @param  \App\admin  $admin
     * @param  \App\Products  $products
     * @return mixed
     */
    public function forceDelete(Admin $admin)
    {
        //
    }
}
