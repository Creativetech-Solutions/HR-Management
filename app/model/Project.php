<?php

namespace App\model;


use Illuminate\Database\Eloquent\Model;


class Project extends Model
{
    Protected $fillable=[
        'name','client_id','budget','currency','project_manager','developers','required_skills','project_status','payment_status','start_date','due_date','description'
    ];
    public function get_client_data(){
        return $this->belongsTo('App\model\Clients','client_id');
    }
    public function get_mile_stone(){
        return $this->hasMany('App\model\Milestone','project_id');
    }
    public function get_tasks(){
        return $this->belongsTo('App\model\Task','id');
    }

 }
