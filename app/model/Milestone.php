<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    Protected $fillable=[
        'title','description','emp_id','project_id','budget','currency','mile_status','payment_status','start_date','due_date'
    ];
}
