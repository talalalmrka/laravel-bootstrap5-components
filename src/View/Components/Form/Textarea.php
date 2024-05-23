<?php

namespace Fadgram\LaravelBootstrap5Components\View\Components\Form;

use Fadgram\LaravelBootstrap5Components\View\Components\BaseComponent;
use Closure;
use Illuminate\Contracts\View\View;

class Textarea extends InputComponent
{
    public $name;
    public $value;
    public $cols;
    public $rows;
    public $default_class = 'form-control';
    /*public function __construct(
        $type = null,
        $name = null,
        $value = null,
        $cols = null,
        $rows = null,

    ) {
        $this->type = $type;
        $this->name = $name;
        $this->value = $value;
        $this->$cols = $cols;
        $this->$rows = $rows;
    }*/
    public $fillable_attributes = [
        'id',
        'name',
        'cols',
        'rows',
    ];
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.textarea', $this->toArray());
    }
    /**
     */
    public function render_additional_attributes() {
    }
}
