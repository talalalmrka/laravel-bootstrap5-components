<?php

namespace Fadgram\LaravelBootstrap5Components\View\Components\Elements;

use Fadgram\LaravelBootstrap5Components\View\Components\BaseComponent;
use Closure;
use Illuminate\Contracts\View\View;

class Paragraph extends BaseComponent
{
    public $content;
    /**
     * Create a new component instance.
     */
    /*public function __construct($content = null)
    {
        $this->content = $content;
    }*/

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.elements.paragraph', $this->toArray());
    }
    /**
     */
    public function render_additional_attributes() {
    }
}
