<?php

namespace Fadgram\LaravelBootstrap5Components\Elements;

use Fadgram\LaravelBootstrap5Components\View\Components\BaseComponent;
use Closure;
use Illuminate\Contracts\View\View;

class Text extends BaseComponent
{
    public $text;
    /**
     * Create a new component instance.
     */
    /*public function __construct($text = '')
    {
        $this->text = $text;
    }*/

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.elements.text', $this->toArray());
    }
    /**
     */
    public function render_additional_attributes() {
    }
}
