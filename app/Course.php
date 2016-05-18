<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model {
    /**
     * The attributes that are mass assignable.
     * example: BSysB, Basis Systeembeheer, JLW475
     * @var array
     */
    protected $fillable = [
        'name', 'fullname', 'code',
    ];

    public function notifications() {
      return $this->hasMany('App\Notification');
    }

    public function users() {
      return $this->belongsToMany('App\User');
    }
}
