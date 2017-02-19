<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use View;

class Widget extends Model
{
    protected $table = 'widgets';

    private $parsedData = [];

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
        $this->parseData();
    }

    public function getData($key)
    {
        return array_get($this->parsedData, $key);
    }

    public function parseData()
    {
        $this->parsedData = json_decode($this->data, true);
    }

    public function getVueTemplate()
    {
        return '<core_widget></core_widget>';
    }
}
