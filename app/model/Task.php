<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name','project_id','assigned_to','assigned_by','due_date','description','status'];
    public function getactivity(){
        return $this->hasMany('App\model\Task_activity');
    }
}

