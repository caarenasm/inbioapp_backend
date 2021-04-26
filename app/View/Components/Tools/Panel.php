<?php

namespace App\View\Components\Tools;

use Illuminate\View\Component;

class Panel extends Component
{
    public $titleClass;
    public $titleFontSize;
    public $title;
    public $bodyClass;
    public $bodyFontSize;
    public $body;
    public $color;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $body, $color='blue', $titleClass='', $titleFontSize='base', $bodyClass='', $bodyFontSize='base')
    {
        $this->title = $title;
        $this->body = $body;
        $this->titleClass = $titleClass;
        $this->titleFontSize = $titleFontSize;
        $this->bodyClass = $bodyClass;
        $this->bodyFontSize = $bodyFontSize;
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.tools.panel');
    }
}
