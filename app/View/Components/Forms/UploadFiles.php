<?php

namespace App\View\Components\Forms;

use App\Models\Imagenes;
use Illuminate\View\Component;

class UploadFiles extends Component
{

    /**
     * The button type.
     *
     * @var Imagenes
     */
    public $imagenes;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($imagenes = null)
    {
        $this->imagenes = $imagenes;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.forms.upload-files');
    }
}
