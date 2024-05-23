<?php

namespace Fadgram\LaravelBootstrap5Components\Form;

use Closure;
use Illuminate\Contracts\View\View;

class SwitchGroup extends CheckGroup
{
    public $id = null;
    public $name = null;
    public $value = [];
    public $multiple = false;
    public $label = null;
    public $options = [];
    public $default_class = 'row mx-0 check-group switch-group';
    public $option_class = 'check-group-item switch-group-item';
    public $option_col = 12;
    public $option_container_attributes;
    public $option_attributes;

    public $options_el = [];

    public $fillable_attributes = [
        'id',
        'name',
        'multiple',
    ];
    public $fillable_bags = [
        'option_container_attributes',
        'option_attributes',
    ];

    public $fillable_classes = [
        'option_container_attributes' => [
            'option_class',
            'option_col',
        ],
    ];

    public function __construct($data = []) {
        parent::__construct($data);
        $this->render_options();
    }

    public function render_options()
    {
        $this->options_el = array_map(function($option) {
            $id = data_get($option, 'value', uniqid());
            $label = data_get($option, 'label', '');
            return switchbox([
                'container_id' => $this->id . '-' . $id.'-container',
                'id' => $this->id . '-' . $id,
                'class' => $this->option_class,
                'name' => $this->name,
                'label' => $label,
                'value' => $id,
                'checked' => checkbox_is_checked($id, $this->value),
                'atts' => $this->option_attributes->getAttributes(),
                'container_atts' => $this->option_container_attributes->getAttributes(),
            ]);
        }, $this->options);
        /*$this->options_el = [];
        array_walk($this->options, function(&$label, $id) {
            $this->options_el[] = switchbox([
                'container_id' => $this->id . '-' . $id.'-container',
                'id' => $this->id . '-' . $id,
                'class' => $this->option_class,
                'name' => $this->name,
                'label' => $label,
                'value' => $id,
                'checked' => checkbox_is_checked($id, $this->value),
                'atts' => $this->option_attributes->getAttributes(),
                'container_atts' => $this->option_container_attributes->getAttributes(),
            ]);
        });*/
    }
    public function render_additional_attributes()
    {
        parent::render_additional_attributes();
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.check-group', $this->toArray());
    }
}
