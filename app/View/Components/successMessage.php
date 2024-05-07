<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class successMessage extends Component
{
    /**
     * Create a new component instance.
     */

    public $mensaje;
    public $type;
    public function __construct($type="", $mensaje = "")
    {
        $this->mensaje = $mensaje;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.success-message');
    }
}
