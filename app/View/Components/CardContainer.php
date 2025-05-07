<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardContainer extends Component
{
    public $title;
    public $icon;
    public $actions;

    public function __construct($title = '', $icon = '', $actions = [])
    {
        $this->title = $title;
        $this->icon = $icon;
        $this->actions = $actions;
    }

    public function render()
    {
        return view('components.card-container');
    }
}