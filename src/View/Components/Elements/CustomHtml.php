<?php

namespace Fadgram\LaravelBootstrap5Components\View\Components\Elements;

use Fadgram\LaravelBootstrap5Components\View\Components\BaseComponent;
use Closure;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\View;

class CustomHtml extends BaseComponent implements Htmlable
{
    public $content;
    public $fillable = [
        'content'
    ];
    public function __construct($html = null) {
        $this->content = $html;
    }
    /**
     */
    public function render_additional_attributes() {
    }
    /**
     * Get content as a string of HTML.
     * @return string
     */
    public function toHtml() {
        return $this->content;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.elements.custom-html', $this->toArray());
    }

}
