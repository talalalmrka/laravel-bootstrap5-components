<?php

namespace Fadgram\LaravelBootstrap5Components\View\Components\Layouts;

use Closure;
use Fadgram\LaravelBootstrap5Components\View\Components\BaseComponent;
use Illuminate\Contracts\View\View;

class Column extends BaseComponent
{
    //public $default_class = 'col';
    public $default_class = '';
    public $size = [];
    public $content;

    /**
     * Create a new component instance.
     */
    /*public function __construct(
        $size = [],
        $content = null,
    )
    {
        $this->size = $size;
        $this->content = $content;
    }*/

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        return view('components.layouts.column', $this->toArray());
    }
    /**
     */
    public function render_additional_attributes() {
        if(!empty($this->size)){
            if(is_array($this->size)){
                foreach($this->size as $k => $v){
                    $this->add_class('col-'.$k.'-'.$v);
                }
            }elseif(is_int($this->size)){
                $this->add_class('col-md-'.$this->size);
            }elseif(is_string($this->size)){
                $this->add_class($this->size);
            }
        }
    }
}
