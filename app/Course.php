<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    protected $fillable = ['no_course', 'course_name', 'sks', 'semester'];
}
