<?php

namespace Fadgram\LaravelBootstrap5Components\Table;

use Fadgram\LaravelBootstrap5Components\View\Components\BaseComponent;
use Closure;
use Illuminate\Contracts\View\View;

class Thead extends BaseComponent
{
    public $color;
    public $rows = [];
    public $fillable_attributes = [
        'id',
        'class',
    ];
    /**
     */
    public function render_additional_attributes() {
        if(!empty($this->color)){
            $this->add_class('table-'.$this->color);
        }
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.thead', $this->toArray());
    }
}
