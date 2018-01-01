<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Leaves extends Model
{
    protected $table ='leave';
    protected $fillable = ['emp_id','description','leave_from','leave_to','status','approved_date','approved_by','total_leave'];
}
