<?php

namespace App\Widgets;

class ScoreWidget extends Widget
{
    public function getVueTemplate()
    {
        return '<widget_score state-widget-id="' . $this->getData('id') . '"></widget_score>';
    }
}