<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function users()
    {
        
       
        $this->belongesTo(User::class);
    }
}
