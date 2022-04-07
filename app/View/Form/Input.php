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
     * The input value.
     *
     * @var string
     */
    public $value;

    /**
     * The input label.
     *
     * @var string
     */
    public $label;

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
     * The disabled attribute.
     *
     * @var boolean
     */
    public $disabled;

    /**
     * The readonly attribute.
     *
     * @var boolean
     */
    public $readonly;

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
    public function __construct($type, $name, $value = null, $label = null, $description = false, $class = null, $row = true, $cols = [], $disabled = false, $readonly = false, $required = true)
    {
        $this->type = $type;
        $this->name = $name;
        $this->value = $value;
        $this->label = $label;
        $this->description = $description;
        $this->class = $class;
        $this->row = $row;
        $this->cols = $cols;
        $this->disabled = $disabled;
        $this->readonly = $readonly;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.form.input');
    }
}
