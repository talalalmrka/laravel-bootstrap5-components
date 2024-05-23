<?php

namespace Fadgram\LaravelBootstrap5Components\View\Components\Elements;

use Fadgram\LaravelBootstrap5Components\View\Components\BaseComponent;
use Closure;
use Illuminate\Contracts\View\View;

class Logo extends BaseComponent
{
    public $theme = null;
    public $width = null;
    public $height = 40;
    public $default_class = 'site-logo';
    /**
     */
    public function render_additional_attributes() {
        $this->attr([
            'src' => logo_url($this->theme),
            'alt' => get_option('site_name'),
        ]);
        if(!empty($this->width)){
            $this->width = is_numeric($this->width) ? $this->width.'px' : $this->width;
            $this->add_style([
                'width: '.$this->width
            ]);
        }
        if(!empty($this->height)){
            $this->height = is_numeric($this->height) ? $this->height.'px' : $this->height;
            $this->add_style([
                'height: '.$this->height
            ]);
        }
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.elements.logo', $this->toArray());
    }
}
