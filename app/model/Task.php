<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name','project_id','assigned_to','assigned_by','due_date','description','status','attachment'];
    Public function getactivity(){
        return $this->hasMany('App\model\Task_activity');
    }
    Public function getreviews(){
        return $this->hasMany('App\model\Task_reviews','task_id');
    }
    Public function task_attachmetns(){
        return $this->hasMany('App\model\Task_attachment','task_id');
    }

}
