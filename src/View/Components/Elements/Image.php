<?php

namespace Fadgram\LaravelBootstrap5Components\View\Components\Elements;

use Fadgram\LaravelBootstrap5Components\View\Components\BaseComponent;
use Closure;
use Illuminate\Contracts\View\View;

class Image extends BaseComponent
{
    public $src;
    public $fillable_attributes = [
        'src',
    ];
    /**
     * Create a new component instance.
     */
    /*public function __construct($src = null)
    {
        $this->src = $src;
    }*/
    /*public function renderSrc() {

        if(!empty($this->src)){
            $this->atts['src'] = $this->src;
        }
        $this->renderAttributes();
    }*/
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        //$this->renderSrc();
        return view('components.elements.image', $this->toArray());
    }
    /**
     */
    public function render_additional_attributes() {
    }
}
