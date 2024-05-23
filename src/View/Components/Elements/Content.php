<?php

namespace Fadgram\LaravelBootstrap5Components\View\Components\Elements;

use Fadgram\LaravelBootstrap5Components\View\Components\BaseComponent;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\View as ViewView;

class Content extends BaseComponent
{
    public $content;
    /**
     * Create a new component instance.
     */
    /*public function __construct($content = null)
    {
        $this->content = $content;
    }*/

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        //return 'content';
        return 'This is Content render must not appear!';
        $content = $this->content;
        if(is_component($content)){
            return $content->render();
        }elseif (is_array($content)) {
            return container([
                'tag' => null,
                'content' => $content,
            ])->render();
        }
        //$data = $this->toArray();
        //return view('components.elements.content', $this->toArray());
    }
    /**
     */
    public function render_additional_attributes() {
    }
}
