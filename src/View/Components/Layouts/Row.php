<?php

namespace Fadgram\LaravelBootstrap5Components\View\Components\Layouts;

use Closure;
use Fadgram\LaravelBootstrap5Components\View\Components\BaseComponent;

use Illuminate\Contracts\View\View;

class Row extends BaseComponent
{
    public $default_class = 'row';
    public $cols;
    /**
     * Create a new component instance.
     */
    /*public function __construct(
        $cols = []
    )
    {
        $this->cols = $cols;
    }*/

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        //dd($this->toArray());
        return view('components.layouts.row', $this->toArray());
    }
    /**
     */
    public function render_additional_attributes() {
    }
}
