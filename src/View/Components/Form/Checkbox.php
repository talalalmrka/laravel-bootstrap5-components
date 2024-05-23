<?php

namespace Fadgram\LaravelBootstrap5Components\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;

class Checkbox extends InputComponent
{
    public $type = 'checkbox';
    public $name = null;
    public $value = 1;
    public $label = null;
    public $checked = false;
    public $disabled = false;
    public $label_attributes;
    public $default_container_class = 'form-check';

    public $fillable_attributes = [
        'id',
        'name',
        'value',
        'checked',
        'disabled',
    ];

    public function render_additional_attributes()
    {
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
