<?php

namespace Fadgram\LaravelBootstrap5Components\Form;

use Closure;
use Illuminate\Contracts\View\View;

class Switchbox extends InputComponent
{
    public $type = 'checkbox';
    public $name;
    public $value;
    public $label;
    public $checked;
    public $label_attributes;
    public $default_container_class = 'form-check form-switch';
    public $fillable_attributes = [
        'id',
        'name',
        'value',
        //'label',
        'checked',
    ];

    public function render_additional_attributes()
    {
        /*$this->container_attr([
            'class' => 'border border-2 border-danger',
        ]);*/
        //attributes
        $this->attr([
            'class' => 'form-check-input',
            'type' => 'checkbox',
        ]);

        //label attributes
        $this->attr([
            'for' => $this->id,
            'class' => 'form-check-label',
        ], 'label_attributes');
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.checkbox', $this->toArray());
    }
}
