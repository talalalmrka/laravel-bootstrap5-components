<?php

namespace Fadgram\LaravelBootstrap5Components\Modal;

//use App\Traits\WithArray;
use Fadgram\LaravelBootstrap5Components\View\Components\BaseComponent;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\ComponentAttributeBag;

class Modal extends BaseComponent
{
    public ModalHeader|null $header = null;
    public ModalBody|null $body;
    public ModalFooter|null $footer;
    public $default_class = 'modal fade';
    public bool $static_backdrop = false;
    public bool $scrollable = false;
    public bool $centered = false;
    public bool $fullscreen = false;
    public string $size = '';

    public $dialog_attributes;
    /*public function __construct($data = []) {
        parent::__construct($data);

    }*/
    /**
     */
    public function render_additional_attributes() {
        $this->dialog_attributes = new ComponentAttributeBag;
        $this->add_class('modal-dialog', 'dialog_attributes');
        $this->attr([
            'tabindex' => '-1',
            'aria-labelledby' => $this->id.'-label',
            'aria-hidden' => 'true',
        ]);

        if($this->static_backdrop){
            $this->attr([
                'data-bs-backdrop' => 'static',
                'data-bs-keyboard' => 'false',
            ]);
        }
        if($this->scrollable){
            $this->add_class('modal-dialog-scrollable', 'dialog_attributes');
        }
        if($this->centered){
            $this->add_class('modal-dialog-centered', 'dialog_attributes');
        }
        if($this->fullscreen){
            $this->add_class('modal-fullscreen', 'dialog_attributes');
        }
        if(!empty($this->size)){
            $this->add_class('modal-'.$this->size, 'dialog_attributes');
        }
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        //dd($this->toArray());
        return view('components.modal.modal', $this->toArray());
    }
}
