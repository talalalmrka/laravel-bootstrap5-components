<?php

namespace Fadgram\LaravelBootstrap5Components\Elements;

use Fadgram\LaravelBootstrap5Components\View\Components\BaseComponent;
use Closure;
use Illuminate\Contracts\View\View;

class Button extends BaseComponent
{
    public $type = 'button';
    public $color = 'primary';
    public $size = null;
    public $icon = null;
    public $iconPosition = 'start';
    public $label = null;
    public $href;
    public $tag = 'button';
    public $middleware = true;
    public $default_class = 'btn';
    public $fillable_attributes = [
        'type',
        'role',
        'disabled',
        'value'
    ];
    /**
     */
    public function render_additional_attributes() {
        if(!empty($this->type)){
            $this->attr([
                'type' => $this->type,
            ]);
        }
        if(!empty($this->color)){
            $this->add_class('btn-'.$this->color);
        }
        if(!empty($this->size)){
            $this->add_class('btn-'.$this->size);
        }
        if(is_string($this->icon)){
            $this->icon = faIcon($this->icon);
        }
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.elements.button', $this->toArray());
    }
}

