<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $user_id='user_id';
    public function user(){
        
        return $this->belongesTo(User::class);
    }
}
