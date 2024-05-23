<?php

namespace Fadgram\LaravelBootstrap5Components\View\Components\Elements;

use Fadgram\LaravelBootstrap5Components\View\Components\BaseComponent;
use Closure;
use Illuminate\Contracts\View\View;

class FaIcon extends BaseComponent
{
    public $icon;
    /**
     */
    public function render_additional_attributes() {
        $this->add_class($this->icon ?? null);
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        //dd($this->toArray());
        return view('components.elements.fa-icon', $this->toArray());
    }
}
