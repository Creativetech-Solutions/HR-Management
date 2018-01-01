<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Salary_transaction extends Model
{
    protected $table  = 'salary_transaction';
   protected $fillable = ['emp_id','trans_date','amount','salary_month','bonus','deduction','status'];
}

