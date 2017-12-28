<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'skill_name','status',
    ];
}
