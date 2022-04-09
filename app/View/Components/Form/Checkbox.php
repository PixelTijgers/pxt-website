<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Checkbox extends Component
{
    /**
     * The input name.
     *
     * @var string
     */
    public $name;

    /**
     * The input id.
     *
     * @var string
     */
    public $id;

    /**
     * The input value.
     *
     * @var string
     */
    public $values;

    /**
     * The input options.
     *
     * @var array
     */
    public $options;

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
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $id = null, $values = null, $options = null, $label = null, $description = false, $class = null)
    {
        $this->name = $name;
        $this->id = $id;
        $this->values = $values;
        $this->options = $options;
        $this->label = $label;
        $this->description = $description;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.checkbox');
    }
}
