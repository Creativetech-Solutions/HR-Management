<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Task_attachment extends Model
{
    protected $table    = 'task_attachment';
    protected $fillable = (['attachment','task_id']);
}
