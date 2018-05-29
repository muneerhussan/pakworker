<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;
class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','api_key',
    ];
        protected $table='users';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function service()
    {
        $this->hasMany(Service::class);
    }
    public function bid()
    {
        $this->hasMany(Bid::class);
    }
    public function rating()
    {
        $this->hasMany(Rating::class);
    }
    public function skill()
    {
        $this->hasMany(Skill::class);
    }
    public function language()
    {
        $this->hasMany(Language::class);
    }
    public function notification_setting()
    {
        $this->hasMany(Notification_Setting::class);
    }
    public function accounts()
    {
        $this->hasOne(Account::class);
    }
    public function locations()
    {
        $this->hasOne(Location::class);
    }
    
    public function profile(){
        return $this->hasOne(Profile::class);
    }
    
    public function roles(){
      return $this->belongsToMany(Role::class);   
    }
  
    
}