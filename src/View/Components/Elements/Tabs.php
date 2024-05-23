<?php

namespace Fadgram\LaravelBootstrap5Components\Elements;

use Fadgram\LaravelBootstrap5Components\View\Components\BaseComponent;
use Closure;
use Illuminate\Contracts\View\View;

class Tabs extends BaseComponent
{
    public $id;
    public $type = 'pills';
    public $tabs = [];
    public function renderItems() {
        $tabs = array_map(function($tab) {
            return array_merge($tab, ['id' => uniqid('tab-')]);
        }, $this->tabs);
        $this->tabs = $tabs;
    }
    /**
     */
    public function render_additional_attributes() {
        if(empty($this->id)){
            $this->id = uniqid('tabs-');
        }
        $this->renderItems();
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        //dd($this->toArray());
        return view('components.elements.tabs', $this->toArray());
    }
}

