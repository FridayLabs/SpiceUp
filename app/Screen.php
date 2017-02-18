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

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $model->public_id = uniqid('', true);
        });
    }
}
