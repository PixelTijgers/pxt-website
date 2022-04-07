<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class File extends Component
{
    /**
     * The input label.
     *
     * @var string
     */
    public $label;

    /**
     * The input name.
     *
     * @var string
     */
    public $name;

    /**
     * The input file.
     *
     * @var string
     */
    public $file;

    /**
     * The allowed input extensions.
     *
     * @var string
     */
    public $extensions;

    /**
     * The input description.
     *
     * @var string
     */
    public $description;

    /**
     * The input class.
     *
     * @var string
     */
    public $class;

    /**
     * The input wrapper class.
     *
     * @var string
     */
    public $wrapperClass;

    /**
     * The input row (custom).
     *
     * @var boolean
     */
    public $row;

    /**
     * The input cols (custom).
     *
     * @var array
     */
    public $cols;

    /**
     * The required attribute.
     *
     * @var boolean
     */
    public $required;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label = null, $name, $file = null, $extensions, $description = null, $class = null, $wrapperClass = null, $row = null, $cols = [], $required = true)
    {
        $this->label = $label;
        $this->name = $name;
        $this->file = $file;
        $this->extensions = $extensions;
        $this->description = $description;
        $this->class = $class;
        $this->wrapperClass = $wrapperClass;
        $this->row = $row;
        $this->cols = $cols;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.form.file');
    }
}
