<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Loading extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $message;
    public $color;
    public $target;
    public $textColor;

    public function __construct($target, $textColor = 'white', $message = '', $color = '#ccc')
    {
        $this->message = $message;
        $this->color = $color;
        $this->target = $target;
        $this->textColor = $textColor;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.loading');
    }
}
