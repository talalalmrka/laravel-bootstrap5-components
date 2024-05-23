<?php

namespace Fadgram\LaravelBootstrap5Components\View\Components\Modal;

//use App\Traits\WithArray;
use Fadgram\LaravelBootstrap5Components\View\Components\BaseComponent;
use Closure;
use Illuminate\Contracts\View\View;

class ModalFooter extends BaseComponent
{
    public $content = null;
    public $default_class = 'modal-footer';

    /**
     */
    public function render_additional_attributes() {

    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal.modal-footer', $this->toArray());
    }
}
