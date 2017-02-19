<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Screen extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function states()
    {
        return $this->hasMany('App\ScreenState', 'screen_id');
    }

    public function activeState()
    {
        return $this->belongsTo('App\ScreenState', 'active_state');
    }

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function getWidget($id)
    {
//        $this->activeState->
//        foreach ( as $item) {
//        }

    }

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->public_id = uniqid('', true);
        });
    }
}
