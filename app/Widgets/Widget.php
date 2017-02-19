<?php

namespace App\Widgets;

abstract class Widget
{
    protected $model;
    protected $data = [];

    public function __construct($model)
    {
        $this->model = $model;
        $this->data = $this->parseData();
    }

    public function getData($key)
    {
        return array_get($this->data, $key);
    }

    protected function parseData()
    {
        return json_decode($this->model->data, true);
    }

    public function getVueTemplate()
    {
        return '<core_widget></core_widget>';
    }
}