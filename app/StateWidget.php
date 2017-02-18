<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StateWidget extends Model
{
    public function state() {
        return $this->belongsTo('App\ScreenState', 'state_id');
    }

    public function widget() {
        return $this->belongsTo('App\Widget', 'widget_id');
    }
    //
}
