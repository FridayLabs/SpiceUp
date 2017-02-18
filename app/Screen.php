<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Screen extends Model
{
    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function states() {
        return $this->hasMany('App\ScreenState', 'screen_id');
    }
}
