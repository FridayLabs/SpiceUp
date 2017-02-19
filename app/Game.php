<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }

    public function teamHome()
    {
        return $this->belongsTo(Team::class, 'team_home');
    }

    public function teamAway()
    {
        return $this->belongsTo(Team::class, 'team_away');
    }
}
