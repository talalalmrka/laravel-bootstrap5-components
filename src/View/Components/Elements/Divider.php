<?php

namespace Fadgram\LaravelBootstrap5Components\Elements;

use Fadgram\LaravelBootstrap5Components\View\Components\BaseComponent;
use Closure;
use Illuminate\Contracts\View\View;

class Divider extends BaseComponent
{
    public $color = null;
    public $size = 1;
    public $default_class = 'divider';
    /**
     */
    public function render_additional_attributes() {
        //$this->add_class('my-2');
        if(!$this->size !== null){
            $this->add_class('border-'.$this->size);
        }
        if(!empty($this->color)){
            $this->add_class('border-'.$this->color);
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.elements.divider', $this->toArray());
    }

}
