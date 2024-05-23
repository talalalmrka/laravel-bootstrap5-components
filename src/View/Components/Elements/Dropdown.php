<?php

namespace Fadgram\LaravelBootstrap5Components\View\Components\Elements;

use Fadgram\LaravelBootstrap5Components\View\Components\BaseComponent;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;

class Dropdown extends BaseComponent
{
    public $tag = 'div';
    public $fillable_classes = [
        'container_attributes' => [
            'container_class',
        ],
    ];
    public $default_container_class = 'dropdown';
    public $default_class = 'dropdown-menu';
    public $toggle;
    public $items = [];
    public $middleware = true;
    /**
     */
    public function render_additional_attributes() {
        /*$this->attr($this->dropdown_atts, 'dropdown_attributes');
        $this->attr($this->toggle_atts, 'toggle_attributes');
        $this->attr($this->menu_atts, 'menu_attributes');*/
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        //dd($this->toArray());
        return view('components.elements.dropdown', $this->toArray());
    }
}
