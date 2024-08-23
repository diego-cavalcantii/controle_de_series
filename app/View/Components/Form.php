<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Form extends Component
{
    public $action;
    public $isEdit;
    public $serie;
    public $generos;
    public function __construct($action, $isEdit = false, $serie = null, $generos = null)
    {
        $this->action = $action;
        $this->isEdit = $isEdit;
        $this->serie = $serie;
        $this->generos = $generos;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form');
    }
}
