<?php

namespace Fadgram\LaravelBootstrap5Components\View\Components\Table;

use Fadgram\LaravelBootstrap5Components\View\Components\BaseComponent;
use Closure;
use Illuminate\Contracts\View\View;

class Table extends BaseComponent
{
    public $thead;
    public $tbody;
    public $tfoot;
    public $striped = false;
    public $size = null;
    public $color = null;
    public $default_class = 'table';
    public $fillable_attributes = [
        'id',
        'class',
    ];
    /**
     */
    public function render_additional_attributes() {
        if($this->striped){
            $this->add_class('table-striped');
        }
        if(!empty($this->size)){
            $this->add_class('table-'.$this->size);
        }
        if(!empty($this->color)){
            $this->add_class('table-'.$this->color);
        }
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.table', $this->toArray());
    }
}
