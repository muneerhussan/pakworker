<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aggrement extends Model
{
    public function service()
    {
        $this->belongesToMany(Service::class);
    }  
}
