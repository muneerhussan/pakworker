<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public function users()
    {
        $this->belongesTo(User::class);
    }
    public function service()
    {
        $this->hasMany(Service::class);
    }
}
