<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use View;

class Widget extends Model
{
    protected $data = [];
    protected $beh;

    public function __construct()
    {
        parent::__construct();
        //$this->data = $this->parseData();
    }

    public function getBehaviourAttribute()
    {
        if (!$this->beh) {
            $class = "App\\Widgets\\{$this->type}Widget";
            $this->beh = new $class($this);
        }
        return $this->beh;
    }

//    public function getData($key)
//    {
//        return array_get($this->data, $key);
//    }

    protected function parseData()
    {
        return json_decode($this->data, true);
    }

    public function getVueTemplate()
    {
        return '<core_widget></core_widget>';
    }
    
}
