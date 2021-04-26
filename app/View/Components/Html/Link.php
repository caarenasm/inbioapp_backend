<?php

namespace App\View\Components\Html;

use Illuminate\View\Component;

class Link extends Component
{
    public $href;
    public $text;
    public $id;
    public $class;
    public $isButton;
    public $color;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($href, $text, $id='', $class='', $isButton = false, $color='color-primario')
    {
        $this->href = $href;
        $this->text = $text;
        $this->id = $id;
        $this->class = $class;
        $this->isButton = $isButton;
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.html.link');
    }
}
