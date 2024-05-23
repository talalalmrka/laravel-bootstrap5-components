<?php

namespace Fadgram\LaravelBootstrap5Components\View\Components\Elements;

use Fadgram\LaravelBootstrap5Components\View\Components\BaseComponent;
use Closure;
use Illuminate\Contracts\View\View;

class Pagination extends BaseComponent
{
    public $model = null;
    /**
     */
    public function render_additional_attributes() {
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        //return view('components.heading', $this->toArray());
        return view('components.elements.pagination', $this->toArray());
    }
}
