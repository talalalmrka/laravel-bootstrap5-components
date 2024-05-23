<?php

namespace Fadgram\LaravelBootstrap5Components\View\Components\Layouts;

use Closure;
use Fadgram\LaravelBootstrap5Components\View\Components\BaseComponent;
use Illuminate\Contracts\View\View;

/**
 * Summary of Container
 */
class Container extends BaseComponent
{
    /**
     * Summary of tag
     * @var string
     */
    public $tag = 'div';

    /**
     * Summary of content
     * @var mixed
     */
    public $content;
    
    /**
     * Summary of render
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render(): View|Closure|string
    {
        return view('components.layouts.container', $this->toArray());
    }
    /**
     * Summary of render_additional_attributes
     * @return void
     */
    public function render_additional_attributes()
    {
    }
}
