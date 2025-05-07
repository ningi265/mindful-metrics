<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LineChart extends Component
{
    public $id;
    public $title;
    public $icon;
    public $timeOptions;
    public $defaultTimeOption;

    public function __construct($id, $title, $icon, $timeOptions = [], $defaultTimeOption = '')
    {
        $this->id = $id;
        $this->title = $title;
        $this->icon = $icon;
        $this->timeOptions = $timeOptions;
        $this->defaultTimeOption = $defaultTimeOption;
    }

    public function render()
    {
        return view('components.line-chart');
    }
}