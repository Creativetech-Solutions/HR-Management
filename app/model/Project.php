<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    Protected $fillable=[
        'name','client_id','budget','currency','project_manager','required_skills','project_status','payment_status','start_date','due_date'
    ];
}
