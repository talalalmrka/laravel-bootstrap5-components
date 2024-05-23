<?php

namespace Fadgram\LaravelBootstrap5Components\View\Components\Elements;

use Fadgram\LaravelBootstrap5Components\View\Components\BaseComponent;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;

class Nav extends BaseComponent
{
    public $tag = 'ul';
    public $default_class = 'navbar-navv';
    public $theme = null;
    public $color = null;
    public $items = [];
    public $middleware = true;
    /**
     */
    public function render_additional_attributes()
    {
        if (!empty($this->theme)) {
            $this->attr([
                'data-bs-theme' => $this->theme,
            ]);
        }
        if (!empty($this->color)) {
            $this->add_class('bg-' . $this->color);
        }
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.elements.nav', $this->toArray());
    }
}
