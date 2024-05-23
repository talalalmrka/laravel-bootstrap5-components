<?php

namespace Fadgram\LaravelBootstrap5Components\View\Components\Elements;

use Fadgram\LaravelBootstrap5Components\View\Components\BaseComponent;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OrSeperator extends BaseComponent
{
    public $fillable_bags = [
        //'container_attributes',
        'divider_attributes',
        'label_attributes',
    ];
    public $fillable_classes = [
        'divider_attributes' => [
            'divider_class',
        ],
        'label_attributes' => [
            'label_class',
        ],
    ];
    public $default_container_class = 'container';
    public $default_class = 'row align-items-center';
    public $label;
    public $color = null;
    public $size = 1;

    public $default_label_class = 'col-2 text-center';
    public $label_class;
    public $default_divider_class = 'col-5 border-top';
    public $divider_class;
    /**
     */

    public function __construct($data = []) {
        if(!data_get($data, 'label', false)){
            $data['label'] = __('OR');
        }
        parent::__construct($data);
    }
    public function render_additional_attributes() {
        if(!empty($this->default_label_class)){
            $this->add_class($this->default_label_class, 'label_attributes');
        }
        if(!empty($this->default_divider_class)){
            $this->add_class($this->default_divider_class, 'divider_attributes');
        }
        if(!empty($this->color)){
            $this->add_class('color-'.$this->color);
            $this->add_class('color-'.$this->color, 'label_attributes');
            $this->add_class('border-'.$this->color, 'divider_attributes');
        }
        if(!empty($this->size)){
            $this->add_class('border-'.$this->size, 'divider_attributes');
        }
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        //dd($this->toArray());
        return view('components.elements.or-seperator', $this->toArray());
    }

}
