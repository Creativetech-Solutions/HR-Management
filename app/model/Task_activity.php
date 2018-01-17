<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Task_activity extends Model
{
    protected $table    = 'task_activity';
    protected $fillable = ['user_id','task_id','activity','user_name'];
}
