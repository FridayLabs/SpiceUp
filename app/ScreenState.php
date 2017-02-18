<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScreenState extends Model
{
    public function screen() {
        return $this->belongsTo('App\Screen', 'screen_id');
    }
    public function widgets() {
        return $this->hasMany('App\StateWidget', 'state_id');
    }
}
