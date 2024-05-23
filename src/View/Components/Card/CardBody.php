<?php

namespace Fadgram\LaravelBootstrap5Components\Card;

use Fadgram\LaravelBootstrap5Components\View\Components\BaseComponent;
use Closure;
use Illuminate\Contracts\View\View;

class CardBody extends BaseComponent
{
    public $content = null;
    public $default_class = 'card-body';
    /**
     */
    public function render_additional_attributes() {
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card.card-body', $this->toArray());
    }
}
