<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Button extends Component
{

    /**
     * The button type.
     *
     * @var string
     */
    public $type;

    /**
     * The text to show.
     *
     * @var string
     */
    public $text;

    /**
     * The tailwind width class.
     *
     * @var string
     */
    public $width;

    /**
     * Color of the button
     *
     * @var string
     */
    public $color;

    /**
     * Id of the button
     *
     * @var string
     */
    public $id;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $text, $width = 'w-full', $color = 'color-primario', $id='')
    {
        $this->type = $type;
        $this->text = $text;
        $this->width = $width;
        $this->color = $color;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.forms.button');
    }
}
