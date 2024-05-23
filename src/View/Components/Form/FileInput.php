<?php

namespace Fadgram\LaravelBootstrap5Components\Form;

use App\Models\Media;
use Fadgram\LaravelBootstrap5Components\View\Components\BaseComponent;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;

class FileInput extends InputComponent
{
    public $fillable_attributes = [
        'id',
        'type',
        'name',
        'accept',
        'multiple',
    ];
    public $type = 'file';
    public $name = null;
    public $accept = null;
    public $multiple = false;
    public $size;
    public $value = null;
    public $media = null;
    public $default_class = 'form-control file-input mt-3';
    public $preview_el;
    /*public function __construct($data = []) {
        $data['type'] = 'file';
        parent::__construct($data);

    }*/
    public function render_preview()
    {
        $this->media = [];
        if (!$this->multiple && !empty($this->value) && $this->value instanceof Media) {
            $this->media = $this->value;
            $this->preview_el = $this->media->preview;
        }
    }
    public function render_multiple_preview()
    {
        if ($this->multiple) {
            if ($this->value instanceof Collection) {
                $this->media = $this->value;
                $cols = [];
                foreach ($this->media as $mediaItem) {
                    $cols[] = column([
                        'class' => 'media-card-col',
                        'size' => [
                            'md' => 3,
                            'lg' => 2,
                            'xl' => 2,
                        ],
                        'content' => $mediaItem->preview,
                    ]);
                }
                $this->preview_el = container([
                    'class' => 'file-input-preview',
                    'content' => row([
                        'cols' => $cols,
                    ]),
                ]);
            }
        }
    }
    public function render_additional_attributes()
    {
        $this->render_preview();
        $this->render_multiple_preview();
        if (!empty($this->media)) {
            /*$this->attr([
                'data-fg-media' => json_encode($this->media->toArray()),
            ]);*/
        }
        if(empty($this->preview_el)){
            $this->preview_el = container([
                'tag' => 'label',
                'class' => 'card card-body text-center no-media cursor-pointer',
                'atts' => [
                    'for' => $this->id,
                ],
                'content' => __('Select File'),
            ]);
        }
        /*if (!$this->multiple && !empty($this->value))
            if (!empty($this->value)) {
                if ($this->value instanceof Media) {
                    $this->preview_el = container([
                        'tag' => null,
                        'content' => [
                            $this->value->preview,
                            container([
                                'class' => 'card-img-overlay fs-13px',
                                'content' => mylink([
                                    'class' => 'text-danger',
                                    'icon' => faIcon('fa fa-trash'),
                                    'label' => __('delete'),
                                    'href' => $this->value->delete_url,
                                ]),
                            ]),
                        ],
                    ]);
                } elseif (is_array($this->value)) {
                    $this->preview_el = container([
                        'content' => [
                            row([
                                'cols' => array_map(function ($item) {
                                    return column([
                                        'size' => [
                                            'md' => 4,
                                            'lg' => 3,
                                            'xl' => 2,
                                        ],
                                        'content' => container([
                                            'class' => 'card',
                                            'content' => [
                                                $this->value->preview,
                                                container([
                                                    'class' => 'card-footer',
                                                    'content' => mylink([
                                                        'class' => 'text-danger',
                                                        'icon' => faIcon('fa fa-trash'),
                                                        'label' => __('delete'),
                                                    ]),
                                                ]),
                                            ],
                                        ]),
                                    ]);
                                }, $this->value),
                            ]),
                            container([
                                'class' => 'text-center',
                                'content' => container([
                                    'tag' => 'label',
                                    'class' => 'btn btn-outline-primary',
                                    'label' => __('Select files'),
                                    'atts' => [
                                        'for' => $this->id,
                                    ],
                                ]),
                            ]),
                        ],
                    ]);
                }
            } else {
                $this->preview_el = container([
                    'class' => 'card-body text-center',
                    'content' => __('Select File'),
                ]);
            }*/
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        //dd($this->toArray());
        //$this->renderAdditinalAttributes();
        return view('components.form.file-input', $this->toArray());
    }
}
