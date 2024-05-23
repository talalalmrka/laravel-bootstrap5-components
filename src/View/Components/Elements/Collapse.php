<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Collapse extends BaseComponent
{
    public $id;
    public $tag = 'div';
    public $default_class = 'collapse';
    public $toggle;
    public $content = [];
    public $show = false;
    public $middleware = true;
    /**
     */
    public function render_additional_attributes() {
        if($this->show){
            $this->add_class('show');
        }
        $this->id = $this->id ?? uniqid('collapse');
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        //dd($this->toArray());
        return view('components.elements.collapse', $this->toArray());
    }
}

