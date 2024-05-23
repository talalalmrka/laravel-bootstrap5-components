<?php

namespace Fadgram\LaravelBootstrap5Components\View\Components\Elements;

use Fadgram\LaravelBootstrap5Components\View\Components\BaseComponent;
use Closure;
use Illuminate\Contracts\View\View;

class Progress extends BaseComponent
{
    public $value = 0;
    public $color = 'primary';
    public $min = 0;
    public $max = 100;
    public $size = null;
    public $showPercent = false;
    public $default_class = 'progress';

    public $fillable_attributes = [];
    /**
     * Create a new component instance.
     */
    /*public function __construct(
        $value = 0,
        $color = 'primary',
        $min = 0,
        $max = 100,
        $size = 'sm',
        $showPercent = false,
    )
    {
        $this->value = $value;
        $this->color = $color;
        $this->min = $min;
        $this->max = $max;
        $this->size = $size;
        $this->showPercent = $showPercent;
    }*/
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.elements.progress', $this->toArray());
    }
    /**
     */
    public function render_additional_attributes() {
    }
}
