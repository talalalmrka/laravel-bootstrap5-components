<?php

namespace Fadgram\LaravelBootstrap5Components\Elements;

use Fadgram\LaravelBootstrap5Components\View\Components\BaseComponent;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;

class NavItem extends BaseComponent
{
    public $default_container_class = 'nav-item';
    public $default_class = 'nav-link';
    public $icon = null;
    public $label = null;
    public $href = null;
    public $active = false;
    public $middleware = true;
    public $fillable_attributes = [
        'href',
    ];
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        //dump($this->toArray());
        return view('components.elements.nav-item', $this->toArray());
    }
    /**
     */
    public function render_additional_attributes() {
        if(!empty($this->icon) && is_string($this->icon)){
            $this->icon = faIcon($this->icon);
        }
        if($this->active){
            $this->add_class('active');
        }
    }
}
