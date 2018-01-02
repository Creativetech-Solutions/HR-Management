<?php

namespace App\Http\Controllers\Settings;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse ; // for data table

class Setting extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function logo(){
        return view('settings.logo');
    }
    public function update_logo( Request $request){
       // $settings $settings->
    }
}
