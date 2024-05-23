<?php

namespace Fadgram\LaravelBootstrap5Components\Elements;

use Fadgram\LaravelBootstrap5Components\View\Components\BaseComponent;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends BaseComponent
{
    public $default_class = 'alert';
    public $type = 'info';
    public $content = null;
    /**
     */
    public function render_additional_attributes() {
        if(!empty($this->type)){
            $this->add_class('alert-'.$this->type);
        }
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.elements.alert');
    }

}
