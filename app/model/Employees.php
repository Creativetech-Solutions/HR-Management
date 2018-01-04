<?php

namespace App\model;
use Illuminate\Database\Eloquent\Model;
class Employees extends Model
{
    protected $table = 'employee';
    protected $fillable = [
        'user_id','join_date','last_increment','salary','total_leaves','required_skills','phone',
    ];
    public function skills(){
        return $this->hasMany('App\model\Skills');
    }

}
