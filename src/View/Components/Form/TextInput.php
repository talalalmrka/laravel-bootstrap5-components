<?php

namespace Fadgram\LaravelBootstrap5Components\View\Components\Form;

use Fadgram\LaravelBootstrap5Components\View\Components\BaseComponent;
use Closure;
use Illuminate\Contracts\View\View;

class TextInput extends InputComponent
{
    public $type;
    public $name;
    public $value;
    public $placeholder;
    public $size;
    public $default_class = 'form-control';
    public $fillable_attributes = [
        'id',
        'type',
        'name',
        'value',
        'autocomplete',
        'placeholder',
    ];
    public function render_additional_attributes() {
        if($this->has_error()){
            $this->attr([
                'aria-describedby' => $this->id . '-error',
                'class' => 'is-invalid',
            ]);
        }
        if(!empty($this->size)){
            $this->add_class('form-control-'.$this->size);
        }
        if ($this->type == 'tel') {
            //$this->add_class('phone-input');
            /*$this->attr([
                'class' => 'phone-input',
            ]);*/
        }
    }
    /*public function renderAdditinalAttributes() {
        $this->default_class .= ' form-control';
        if(!empty($this->type)){
            $this->default_class .= ' form-control-'.$this->type;
            $this->atts['type'] = $this->type;
        }
        if(!empty($this->name)){
            $this->atts['name'] = $this->name;
        }
        if(!empty($this->value)){
            $this->atts['value'] = $this->value;
        }
        $this->renderAttributes();

    }*/
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        //$this->renderAdditinalAttributes();
        return view('components.form.text-input', $this->toArray());
    }
}
