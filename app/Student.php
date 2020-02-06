<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name','batch','Description','pro_pic'];

    // public function scopePending($filter)
    // {
       
    //     return $filter->where('id','>' 10);
    // }
}
