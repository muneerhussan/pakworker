<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public function users()
    {
        $this->belongesTo(User::class);
    }
}
