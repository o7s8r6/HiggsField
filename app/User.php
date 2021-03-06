<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\FriendsUsers;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'nickname',
        'email',
        'password',
        'gender',
        'birthdate',
        'profile_picture',
        'hometown',
        'marital_status',
        'about',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function phoneNumbers(){
        return $this->hasMany('App\PhoneNumber', 'user_id');
    }
    
    public function posts(){
        return $this->hasMany('App\Post', 'user_id');
    }

    public function friends(){
        return $this->belongsToMany('App\User', 'friends_users', 'user_id', 'friend_id')->where('state', '1');
    }

    public function requests(){
        return $this->hasMany('App\FriendsUsers', 'friend_id')->where('state', '0');
    }

}
