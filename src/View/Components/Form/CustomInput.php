<?php

namespace Fadgram\LaravelBootstrap5Components\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;

class CustomInput extends InputComponent
{
    public $label;
    public $content;
    public $label_attributes;

    public $fillable_attributes = [
        'id',
    ];

    public function render_additional_attributes()
    {
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.custom-input', $this->toArray());
    }
}
