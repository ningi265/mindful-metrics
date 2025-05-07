<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DataTable extends Component
{
    public $title;
    public $icon;
    public $columns;
    public $rows;
    public $viewAllLink;

    public function __construct($title, $icon, $columns = [], $rows = [], $viewAllLink = '#')
    {
        $this->title = $title;
        $this->icon = $icon;
        $this->columns = $columns;
        $this->rows = $rows;
        $this->viewAllLink = $viewAllLink;
    }

    public function render()
    {
        return view('components.data-table');
    }
}