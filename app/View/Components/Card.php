<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    public $header;
    public $body;
    public $title;
    /**
     * Create a new component instance.
     */
    public function __construct($header,$body,$title)
    {
        $this->header = $header;
        $this->body = $body;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card');
    }
}
