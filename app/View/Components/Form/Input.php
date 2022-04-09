<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Input extends Component
{
    /**
     * The input type.
     *
     * @var string
     */
    public $type;

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
     * The required attribute.
     *
     * @var boolean
     */
    public $required;

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
    public function __construct($type, $name, $label, $value = null, $id = null, $class = null, $required = true, $description = null)
    {
        $this->type = $type;
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
        $this->id = $id;
        $this->class = $class;
        $this->required = $required;
        $this->description = $description;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.input');
    }
}
