<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Task_reviews extends Model
{
    protected $fillable = ['task_id','user_id','review'];
}
