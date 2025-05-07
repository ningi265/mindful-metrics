<?php

namespace App\View\Components;

use Illuminate\View\Component;

class StatsCard extends Component
{
    public $icon;
    public $label;
    public $value;
    public $trend;
    public $trendValue;
    public $metaText;
    public $cardClass;

    public function __construct($icon, $label, $value, $trend = 'neutral', $trendValue = '0%', $metaText = '', $cardClass = '')
    {
        $this->icon = $icon;
        $this->label = $label;
        $this->value = $value;
        $this->trend = $trend;
        $this->trendValue = $trendValue;
        $this->metaText = $metaText;
        $this->cardClass = $cardClass;
    }

    public function render()
    {
        return view('components.stats-card');
    }
}