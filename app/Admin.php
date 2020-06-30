<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as AuthUserClass;
use Illuminate\Notifications\Notifiable;
class Admin extends AuthUserClass
{
    use Notifiable;//this is a trait
    protected $fillable = ['name', 'email', 'password'];
    protected $hidden = ['password', 'remember_token'];
}
