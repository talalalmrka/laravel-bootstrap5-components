<?php

namespace Fadgram\LaravelBootstrap5Components\View\Components\Form;

use Fadgram\LaravelBootstrap5Components\View\Components\BaseComponent;
use Closure;
use Illuminate\Support\Arr;
use Illuminate\Support\ViewErrorBag;
use Illuminate\View\ComponentAttributeBag;

abstract class InputComponent extends BaseComponent
{
    public $id;
    public $type;
    public $icon;
    public $label;
    public $name;
    public $value;
    public $options;
    public $checked;
    public $required;
    public $col;
    public $multiple;
    public $startIcon;
    public $endIcon;
    public $info;
    public $placeholder;
    public $media;
    public $label_el;
    public $info_el;
    public $error_el;
    public $input_el;
    public $start_icon_el;
    public $end_icon_el;
    public $label_attributes;
    public $info_attributes;
    public $error_attributes;
    public $icons_container_attributes;
    public $has_any_icon = false;
    public $fillable_attributes = [
        'id',
        'type',
        'name',
        'value',
        'checked',
        'placeholder',
    ];

    public function __construct(array $data = [])
    {
        parent::__construct($data);
        $this->icons_container_attributes = new ComponentAttributeBag([
            'class' => 'field-with-icon',
        ]);
        $this->render_label();
        $this->render_info();
        $this->render_error();
        $this->render_input();
    }
    public function render_label()
    {
        if (!empty($this->label) || !empty($this->icon)) {

            $required_el = $this->required ? container([
                'tag' => 'span',
                'class' => 'text-danger',
                'content' => '*',
            ]) : null;
            $this->label_el = container([
                'tag' => 'label',
                'class' => 'form-label',
                'atts' => [
                    'for' => $this->id ?? null,
                ],
                'content' => [
                    $this->icon,
                    $this->label,
                    $required_el,
                ],
            ]);
        } else {
            $this->label_el = null;
        }
    }
    public function render_info()
    {
        if (!empty($this->info)) {
            $infoData = [
                'tag' => 'div',
                'class' => 'form-text',
                'content' => $this->info,
            ];
            if (!empty($this->id)) {
                $infoData['atts']['id'] = $this->id . '-help';
            }
            $this->info_el = container($infoData);
        } else {
            $this->info_el = null;
        }
    }
    public function render_error()
    {
        if (!empty($this->id)) {
            $errors = session()->get('errors', app(ViewErrorBag::class));
            if ($errors->has($this->id) || $errors->has($this->name)) {
                $this->attr([
                    'aria-describedby' => $this->id . '-error',
                    'class' => 'is-invalid',
                ]);
                $this->add_class('is-invalid', 'icons_container_attributes');
                $error = $errors->get($this->id);
                $error_content = is_array($error) ? container([
                    'tag' => 'ul',
                    'content' => array_map(function ($e) {
                        return container([
                            'tag' => 'li',
                            'content' => $e,
                        ]);
                    }, $error)
                ]) : $error;
                $this->error_el = container([
                    'id' => $this->id . '-error',
                    'class' => 'invalid-feedback',
                    'content' => $error_content,
                ]);
            }
        }
    }
    public function render_start_icon()
    {
        if (!empty($this->startIcon)) {
            $this->startIcon = is_string($this->startIcon) ? faIcon($this->startIcon) : $this->startIcon;
            $this->start_icon_el = container([
                'tag' => 'span',
                'class' => 'start-icon',
                'content' => $this->startIcon,
            ]);
            $this->has_any_icon = true;
            $this->add_class('has-start-icon', 'icons_container_attributes');
        } else {
            $this->start_icon_el = null;
        }
    }
    public function render_end_icon()
    {
        if (!empty($this->endIcon)) {
            $this->endIcon = is_string($this->endIcon) ? faIcon($this->endIcon) : $this->endIcon;

            $this->end_icon_el = container([
                'tag' => 'span',
                'class' => 'end-icon',
                'content' => $this->endIcon,
            ]);
        }
        if(!empty($this->end_icon_el)){
            $this->has_any_icon = true;
            $this->add_class('has-end-icon', 'icons_container_attributes');
        }
    }
    public function has_start_icon()
    {
        return !empty($this->start_icon_el);
    }
    public function has_end_icon()
    {
        return !empty($this->end_icon_el);
    }
    public function has_icon()
    {
        return $this->has_start_icon() || $this->has_end_icon();
    }

    public function render_input()
    {
        $this->render_start_icon();
        $this->render_end_icon();
        $this->input_el = container([
            'tag' => 'input',
        ]);
        $this->input_el->attributes = $this->attributes;
        if ($this->has_icon()) {
            $this->input_el = container([
                'class' => Arr::toCssClasses([
                    'field-with-icon',
                    'has-start-icon' => $this->has_start_icon(),
                    'has-end-icon' => $this->has_end_icon(),
                    'is-invalid' => $this->has_error(),
                ]),
                'content' => [
                    $this->start_icon_el,
                    $this->input_el,
                    $this->end_icon_el,
                ],
            ]);
        }
    }
}
