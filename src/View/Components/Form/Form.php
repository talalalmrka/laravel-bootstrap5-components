<?php

namespace Fadgram\LaravelBootstrap5Components\Form;

use Fadgram\LaravelBootstrap5Components\View\Components\BaseComponent;
use Closure;
use Illuminate\Contracts\View\View;

class Form extends BaseComponent
{
    public $method = 'post';
    public $action;
    public $enctype;
    public $submit;
    public $content;
    public $default_class = 'form';
    public $secured_method = null;

    public $fillable_attributes = [
        'method',
        'action',
        'enctype',
    ];
    /**
     */
    public function render_additional_attributes() {
        if(!empty($this->method)){
            if(in_array(strtolower($this->method), ['put', 'patch', 'delete'])){
                $this->secured_method = strtolower($this->method);
                $this->method = 'post';
                $this->attr([
                    'method' => 'post',
                ]);
            }
        }
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        //dump($this->toArray());
        return view('components.form.form', $this->toArray());
    }
}
