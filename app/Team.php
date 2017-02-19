<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function players()
    {
        return $this->hasMany(Player::class);
    }

    public function getShortTitleAttribute()
    {
        return strtoupper(substr($this->title, 0, 3));
    }
}
