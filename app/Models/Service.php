<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function users()
    {
        $this->belongesToMany(User::class);
    }
    
    public function rating()
    {
        $this->belongesTo(Rating::class);
    }
    public function category()
    {
        $this->belongesTo(Category::class);
    }
    public function order()
    {
        $this->hasMany(Order::class);
    }
    public function aggrement()
    {
        $this->belongsToMany(Aggrement::class);
    }
}
