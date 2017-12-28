<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
   // protected $table = 'clients';
    protected $fillable = [
        'user_id','platform','status','required_skills'
    ];
}
