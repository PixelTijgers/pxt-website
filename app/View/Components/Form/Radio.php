<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Radio extends Component
{
    /**
     * The input name.
     *
     * @var string
     */
    public $name;

    /**
     * The input label.
     *
     * @var string
     */
    public $label;

    /**
     * The input options.
     *
     * @var string
     */
    public $options;

    /**
     * The input value.
     *
     * @var string
     */
    public $value;

    /**
     * The input id.
     *
     * @var string
     */
    public $id;

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
     * The input description.
     *
     * @var string
     */
    public $description;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $label, $options, $value = null, $id = null, $class = null, $wrapperClass = null, $description = null)
    {
        $this->name = $name;
        $this->label = $label;
        $this->options = $options;
        $this->value = $value;
        $this->id = $id;
        $this->class = $class;
        $this->wrapperClass = $wrapperClass;
        $this->description = $description;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.radio');
    }
}
