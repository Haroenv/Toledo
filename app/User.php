<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Auth;

class User extends Authenticatable {
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function courses() {
      return $this->belongsToMany('App\Course');
    }

    /**
     * checks if user is admin
     *
     * @return boolean true if admin
     */
    public function isAdmin() {
        return !strpos(Auth::user()->email, 'student');
    }
}
