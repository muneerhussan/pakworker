<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    public function category()
    {
        $this->hasMany(Category::class);
    }
    public function bid()
    {
        $this->hasMany(Bid::class);
    }
}
