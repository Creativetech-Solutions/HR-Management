<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Employee_document extends Model
{
    protected $table    = "employee_document";
    protected $fillable = ['emp_id','document','doc_id'];
}
