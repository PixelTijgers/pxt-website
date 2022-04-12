<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Textarea extends Component
{
    /**
     * The input name.
     *
     * @var string
     */
    public $name;

    /**
     * The input name.
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
     * The maxlength of the textarea.
     *
     * @var boolean
     */
    public $maxLength;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $required = null, $value = null, $label = null, $description = false, $class = null, $maxLength = null)
    {
        $this->name = $name;
        $this->required = $required;
        $this->value = $value;
        $this->label = $label;
        $this->description = $description;
        $this->class = $class;
        $this->maxLength = $maxLength;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.textarea');
    }
}
