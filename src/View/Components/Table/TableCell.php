<?php

namespace Fadgram\LaravelBootstrap5Components\View\Components\Table;

use Fadgram\LaravelBootstrap5Components\View\Components\BaseComponent;
use Closure;
use Illuminate\Contracts\View\View;

class TableCell extends BaseComponent
{
    public $type = 'td';
    public $colspan;
    //public $scope = 'col';
    public $scope = null;
    public $content;
    public $fillable_attributes = [
        'colspan',
        'scope',
    ];
    /**
     */
    public function render_additional_attributes() {
        /*if(!empty($this->scope)){
            $this->attr([
                'scope' => $this->scope,
            ]);
        }*/
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.table-cell', $this->toArray());
    }
}
