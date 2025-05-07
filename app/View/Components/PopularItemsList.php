<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PopularItemsList extends Component
{
    public $title;
    public $icon;
    public $items;

    public function __construct($title, $icon, $items = [])
    {
        $this->title = $title;
        $this->icon = $icon;
        $this->items = $items;
    }

    public function render()
    {
        return view('components.popular-items-list');
    }
}