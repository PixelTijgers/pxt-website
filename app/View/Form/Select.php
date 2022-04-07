<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Select extends Component
{
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
     * The input options.
     *
     * @var array
     */
    public $options;

    /**
     * The valuewrapper for the items.
     *
     * @var array
     */
    public $valueWrapper;

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
     * The disabled attribute.
     *
     * @var boolean
     */
    public $disabled;

    /**
     * The disabled attribute.
     *
     * @var string
     */
    public $disabledOption;

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
    public function __construct($name, $value = null, $options = null, $valueWrapper = false, $label = null, $description = false, $class = null, $wrapperClass = null, $row = true, $cols = [], $disabled = false, $disabledOption = null, $required = true)
    {
        $this->name = $name;
        $this->value = $value;
        $this->options = $options;
        $this->valueWrapper = $valueWrapper;
        $this->label = $label;
        $this->description = $description;
        $this->class = $class;
        $this->wrapperClass = $wrapperClass;
        $this->row = $row;
        $this->cols = $cols;
        $this->disabled = $disabled;
        $this->disabledOption = $disabledOption;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.form.select');
    }
}
