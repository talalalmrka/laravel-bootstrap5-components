<?php

namespace Fadgram\LaravelBootstrap5Components\View\Components\Card;

use Fadgram\LaravelBootstrap5Components\View\Components\BaseComponent;
use Closure;
use Illuminate\Contracts\View\View;

class OverviewCard extends BaseComponent
{
    public $label;
    public $icon;
    public $color;
    public $content;
    public $default_class = 'card shadow h-1000 py-2 mb-4';

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card.overview-card', $this->toArray());
    }
    /**
     */
    public function render_additional_attributes() {
        if(!empty($this->color)){
            $this->add_class(' border-left-'.$this->color);
        }
    }
}
