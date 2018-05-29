<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    public function users()
    {
        $this->belongesTo(User::class);
    }
    public function request()
    {
        $this->belongesTo(Request::class);
    }
}
