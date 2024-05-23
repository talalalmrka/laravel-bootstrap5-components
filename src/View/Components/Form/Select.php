<?php

namespace Fadgram\LaravelBootstrap5Components\Form;

use Closure;
use Illuminate\Contracts\View\View;

class Select extends InputComponent
{
    public $id;
    public $name;
    public $value;
    public $multiple = false;
    public $label;
    public $options = [];
    public $default_class = 'form-select';
    public $options_el;
    public $size;
    public $fillable_attributes = [
        'id',
        'name',
        'multiple',
    ];

    public function render_additional_attributes()
    {
        if(!empty($this->size)){
            $this->add_class('form-select-'.$this->size);
        }
        //label attributes
        /*$this->attr([
            'for' => $this->id,
            'class' => 'form-label',
        ], 'label_attributes');*/
        $this->render_options();
    }

    public function render_options() {
        foreach ($this->options as $option) {
            $this->options_el[] = container([
                'tag' => 'option',
                'atts' => [
                    'value' => data_get($option, 'value'),
                    'selected' => $this->value == data_get($option, 'value'),
                ],
                'content' => data_get($option, 'label'),
            ]);
        }
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.select', $this->toArray());
    }
}
