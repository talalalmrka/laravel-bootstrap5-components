<?php

namespace Fadgram\LaravelBootstrap5Components\Elements;

use Fadgram\LaravelBootstrap5Components\View\Components\BaseComponent;
use Closure;
use Illuminate\Contracts\View\View;

class Link extends BaseComponent
{
    public $icon;
    public $iconPosition = 'start';
    public $label;
    public $href;
    public $fillable_attributes = [
        'href',
        'target',
        'rel',
    ];
    /**
     */
    public function render_additional_attributes() {
        if(is_string($this->icon)){
            $this->icon = faIcon($this->icon);
        }
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.elements.link', $this->toArray());
    }
}
