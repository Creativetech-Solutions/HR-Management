<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\model\Clients;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'name', 'first_name','last_name','city','country','zipcode','status','gender','password','active','user_type',
    ];
  /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function clients()
    {
        return $this->hasOne('App\model\Clients');
    }
    public function developer()
    {
        return $this->hasOne('App\model\Employees');
    }

}
