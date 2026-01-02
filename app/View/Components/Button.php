<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public $type;
    public $class;
    public $href;
    public $needConfirm;

    public function __construct($type = 'button', $class = 'btn btn-primary', $href = null,  $needConfirm = false)
    {
        $this->type = $type;
        $this->class = $class;
        $this->href = $href;
        $this->needConfirm = $needConfirm;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button');
    }
}
