<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Employee extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   public function index(){
        return view('employee.list');
   }
}
