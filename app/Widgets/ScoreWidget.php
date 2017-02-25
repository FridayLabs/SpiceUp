<?php

namespace App\Widgets;

use App\StateWidget;
use App\Widget;

class ScoreWidget extends Widget
{
    public static function modifyData(StateWidget $stateWidget) {
        
    }
    
    public function getVueTemplate()
    {
        return '<widget_score state-widget-id="' . $this->getData('id') . '"></widget_score>';
    }
}