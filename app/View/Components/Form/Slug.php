<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Slug extends Component
{
    /**
     * The input slugfield.
     *
     * @var string
     */
    public $slugField;

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
     * The model.
     *
     * @var mixed
     */
    public $model;

    /**
     * The model name.
     *
     * @var mixed
     */
    public $modelName;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($slugField, $name, $value = null, $label = null, $description = false, $class = null, $required = true, $model = null, $modelName = null)
    {
        $this->slugField = $slugField;
        $this->name = $name;
        $this->value = $value;
        $this->label = $label;
        $this->description = $description;
        $this->class = $class;
        $this->required = $required;
        $this->model = $model;
        $this->modelName = $modelName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.slug');
    }
}
