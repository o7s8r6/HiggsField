<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhoneNumber extends Model
{

	protected $table = 'phones_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'phone_number',
        'user_id',
    ];

    public function user(){
    	return $this->belongsTo('App\User', 'user_id');
    }
}
