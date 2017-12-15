<?php

namespace App\Http\Controllers\Client;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class client extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  public function index(){
      return view('client.Add_client');
  }
    public function add(){
        return view('client.Add_client');
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function store(array $data)
    {
        return User::create([
            'email'       => $data['email'],
            'name'        => $data['firstname'],
            'city'        => $data['city'],
            'gender'      => $data['gender'],
            'password'    => bcrypt($data['password']),
        ]);
    }
}
