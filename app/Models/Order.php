<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function service()
    {
        $this->belongsTo(Service::class);
    }
}
