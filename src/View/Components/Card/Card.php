<?php

namespace Fadgram\LaravelBootstrap5Components\View\Components\Card;

//use App\Traits\WithArray;
use Fadgram\LaravelBootstrap5Components\View\Components\BaseComponent;
use Closure;
use Illuminate\Contracts\View\View;

class Card extends BaseComponent
{
    public $id;
    public $header = null;
    public $body = null;
    public $footer = null;
    public $default_class = 'card';
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card.card', $this->toArray());
    }
    /**
     */
    public function render_additional_attributes() {
    }
}
