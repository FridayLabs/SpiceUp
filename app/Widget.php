<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use View;

class Widget extends Model
{
    private $parsedData = array();

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
        $this->parseData();
    }

    public function getData($key) {
        return (isset($this->parsedData[$key]))?$this->parsedData[$key]:null;
    }
    
    public function parseData() {
        $this->parsedData = json_decode($this->data, true);
    }

    public function getVueTemplate() {
        return '<core_widget></core_widget>';
    }
}
