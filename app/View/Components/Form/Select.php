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
     * Required value.
     *
     * @var string
     */
    public $required;

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
     * The disabled attribute.
     *
     * @var string
     */
    public $disabledOption;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $required, $value = null, $options = null, $valueWrapper = false, $label = null, $description = false, $class = null, $disabledOption = null)
    {
        $this->name = $name;
        $this->required = $required;
        $this->value = $value;
        $this->options = $options;
        $this->valueWrapper = $valueWrapper;
        $this->label = $label;
        $this->description = $description;
        $this->class = $class;
        $this->disabledOption = $disabledOption;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.select');
    }
}
