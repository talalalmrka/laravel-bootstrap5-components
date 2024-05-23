<?php

namespace Fadgram\LaravelBootstrap5Components\Card;

use Fadgram\LaravelBootstrap5Components\View\Components\BaseComponent;
use Closure;
use Illuminate\Contracts\View\View;

class CardFooter extends BaseComponent
{
    public $content;
    public $default_class = 'card-footer';
    /**
     * Create a new component instance.
     */
    /*public function __construct(
        $content = null,
    ) {
        $this->content = $content;
    }*/
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card.card-footer', $this->toArray());
    }
    /**
     */
    public function render_additional_attributes() {
    }
}
