<?php

namespace Fadgram\LaravelBootstrap5Components\Form;

use Fadgram\LaravelBootstrap5Components\View\Components\BaseComponent;
use Illuminate\Support\Arr;
use Illuminate\Support\ViewErrorBag;

class Field extends BaseComponent
{
    public $data;
    public $type;
    public $col = 12;
    public $content = null;
    public $default_container_class = 'form-field mb-3';
    public $middleware = true;

    public function __construct($data = [])
    {
        parent::__construct($data);
        //$data['type'] = 'file';
        $this->data = $data;
    }
    /**
     * Get the view / view contents that represent the component.
     * @return callable|string|\Illuminate\Contracts\Support\Htmlable|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        if(!$this->middleware){
            return null;
        }
        switch ($this->type) {
            case 'text':
            case 'password':
            case 'email':
            case 'url':
            case 'number':
            case 'tel':
            case 'hidden':
            case 'date':
            case 'time':
                $this->content = textInput($this->data);
                break;
            case 'price':
                $this->content = priceInput($this->data);
                break;
            case 'textarea':
                $this->content = textarea($this->data);
                break;
            case 'checkbox':
                $this->content = checkbox($this->data);
                break;
            case 'switch':
                $this->content = switchbox($this->data);
                break;
            case 'radio':
                $this->content = radiobox($this->data);
                break;
            case 'check_group':
                $this->content = checkGroup($this->data);
                break;
            case 'switch_group':
                $this->content = switchGroup($this->data);
                break;
            case 'radio_group':
                $this->content = radioGroup($this->data);
                break;
            case 'select':
                $this->content = formSelect($this->data);
                break;
            case 'file':
                $this->content = fileInput($this->data);
                break;
            case 'custom':
                $this->content = customInput($this->data);
                break;
            case 'location':
                $this->content = locationInput($this->data);
                break;
            default:
                //$this->content = $this->toArray();
                $this->content = pre($this->toArray(), false);
                break;
        }
        return view('components.form.field', $this->toArray());
    }

    /**
     */
    public function render_additional_attributes()
    {
        if (!empty($this->col)) {
            $this->add_container_class('col-md-' . $this->col);
        }
    }
}
