<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model {

  use SoftDeletes;

  protected $fillable = [
    'title',
    'content',
  ];

  protected $dates = ['deleted_at'];

  /**
   * Get the course that this notification belongs to
   */
  public function course() {
    return $this->belongsTo('App\Course');
  }
}
