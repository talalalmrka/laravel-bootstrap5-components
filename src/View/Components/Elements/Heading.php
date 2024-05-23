<?php

namespace Fadgram\LaravelBootstrap5Components\Elements;

use Fadgram\LaravelBootstrap5Components\View\Components\BaseComponent;
use Closure;
use Illuminate\Contracts\View\View;

class Heading extends BaseComponent
{
    public $size = 1;
    public $icon = null;
    public $content = null;
    /**
     * Create a new component instance.
     */
    /*public function __construct(
        $size = 1,
        FaIcon|null $icon = null,
        $content = null,
    )
    {
        $this->size = $size;
        $this->icon = $icon;
        $this->content = $content;
    }*/

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        //return view('components.heading', $this->toArray());
        return view('components.elements.heading', $this->toArray());
    }
    /**
     */
    public function render_additional_attributes() {
    }
}
