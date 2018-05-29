<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification_Setting extends Model
{
    public function users()
    {
        $this->belongesTo(User::class);
    }
}
