<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class StateWidget extends Model
{
    public function state()
    {
        return $this->belongsTo(ScreenState::class, 'state_id');
    }

    public function widget()
    {
        return $this->belongsTo(Widget::class, 'widget_id');
    }

    public function saveWidget(Request $request)
    {

    }
}
