<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model {

  protected $fillable = [
    'title',
    'content',
  ];

  /**
   * Get the course that this notification belongs to
   */
  public function course() {
    return $this->belongsTo('App\Course');
  }
}
