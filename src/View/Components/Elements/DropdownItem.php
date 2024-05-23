<?php

namespace Fadgram\LaravelBootstrap5Components\View\Components\Elements;

use Fadgram\LaravelBootstrap5Components\View\Components\BaseComponent;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;

class DropdownItem extends BaseComponent
{
    public $fillable_attributes = [
        'id',
        'class',
        'style',
        'href',
        'target',
        'rel',
    ];
    public $default_class = 'dropdown-item';
    public $icon = null;
    public $label = null;
    public $route = null;
    public $route_params = [];
    public $href = '#';
    public $active = false;
    public $divider = false;
    public $middleware = true;
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        if(!$this->middleware){
            return '';
        }
        //dd($this->toArray());
        return view('components.elements.dropdown-item', $this->toArray());
    }
    /**
     */
    public function render_additional_attributes() {
        if(!empty($this->route) && Route::has($this->route)){
            $this->href = route($this->route, $this->route_params);
            $this->active = request()->routeIs($this->route);
            $this->attr([
                'href' => route($this->route, $this->route_params),
            ]);
        }

        if($this->active){
            $this->add_class('active');
        }

        if(!empty($this->icon) && is_string($this->icon)){
            $this->icon = faIcon($this->icon);
        }
    }
}
