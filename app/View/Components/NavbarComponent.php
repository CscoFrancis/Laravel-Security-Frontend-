<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NavbarComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $message;
    public $title = 'Navigation';
    public function __construct($message)
    {
        $this->message = $message;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.navbar-component');
    }
}
