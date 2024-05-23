<?php

namespace Fadgram\LaravelBootstrap5Components\View\Components\Form;

use Fadgram\LaravelBootstrap5Components\View\Components\BaseComponent;
use App\View\Components\Layouts\Container;

class Fields extends BaseComponent
{
    public $fields = [];
    public $default_class = 'row form-fields';
    /*public function __construct($fields = [])
    {
        $this->fields = $fields;
    }*/
    public function render()
    {
        return view('components.form.fields', $this->toArray());
    }
    /**
     */
    public function render_additional_attributes() {
    }
}
