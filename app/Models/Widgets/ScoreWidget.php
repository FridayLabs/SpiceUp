<?php

namespace App\Models\Widgets;

use View;
use App\Widget;

class ScoreWidget extends Widget
{
    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
    }

    public function getVueTemplate()
    {
        return '<widget_score state-widget-id="' . $this->id . '"></widget_score>';
    }
}
