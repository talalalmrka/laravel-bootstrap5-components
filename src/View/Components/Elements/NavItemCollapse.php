<?php

namespace Fadgram\LaravelBootstrap5Components\Elements;

use Fadgram\LaravelBootstrap5Components\View\Components\BaseComponent;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;

class NavItemCollapse extends BaseComponent
{
    public $id;
    public $fillable_attributes = [
        'href',
        'target',
        'title',
    ];
    public $fillable_bags = [
        'toggle_attributes',
        'collapse_attributes',
    ];
    public $collapse_tag = 'div';
    public $toggle_atts = [];
    public $collapse_atts = [];
    public $default_container_class = '';
    public $default_class = 'nav-item has-collapse';
    public $default_toggle_class = 'nav-link nav-item-collapse-toggle d-flex justify-content-between';
    public $default_collapse_class = 'nav nav-pills flex-column bg-white collapse';
    public $icon = null;
    public $label = null;
    public $href = null;
    public $active = false;
    public $items = [];
    public $middleware = true;
    /**
     */
    public function render_additional_attributes() {
        $this->id = $this->id ?? uniqid();

        $this->add_class($this->default_toggle_class, 'toggle_attributes');
        $this->add_class($this->default_collapse_class, 'collapse_attributes');

        $this->attr(array_merge($this->toggle_atts, [
            'href' => '#',
            'data-bs-toggle' => 'collapse',
            'data-bs-target' => '#collapse-'.$this->id,
        ]), 'toggle_attributes');

        $this->attr(array_merge($this->collapse_atts, [
            'id' => 'collapse-'.$this->id,
        ]), 'collapse_attributes');


        if(!empty($this->icon) && is_string($this->icon)){
            $this->icon = faIcon($this->icon);
        }
        $this->render_active();

    }
    public function render_active() {
        foreach ($this->items as $item) {
            if(data_get($item, 'active', false)){
                $this->active = true;
            }
        }
        if($this->active){
            $this->add_class('show', 'collapse_attributes');
            $this->attr(array_merge($this->toggle_atts, [
                'aria-expanded' => 'true',
            ]), 'toggle_attributes');
        }
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        if(!$this->middleware){
            return '';
        }
        return view('components.elements.nav-item-collapse', $this->toArray());
    }
}
