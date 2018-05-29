<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function service()
    {
        $this->hasMany(Service::class);
    }
    public function request()
    {
        $this->belongesTo(Request::class);
    }
    public function rate_Unit()
    {
        $this->hasOne(Rate_Unit::class);
    }
}
