<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $fillable = ['major_code', 'major_name'];

    public function student()
    {
        return $this->hasOne('App\Student', 'major_id');
    }
}
