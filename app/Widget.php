<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use View;

class Widget extends Model
{
    protected $beh;

    public function getBehaviourAttribute()
    {
        if (!$this->beh) {
            $class = "App\\Widgets\\{$this->type}Widget";
            $this->beh = new $class($this);
        }
        return $this->beh;
    }
}
