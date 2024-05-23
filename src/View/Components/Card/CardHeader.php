<?php

namespace Fadgram\LaravelBootstrap5Components\Card;

use Fadgram\LaravelBootstrap5Components\View\Components\BaseComponent;
use Closure;
use Illuminate\Contracts\View\View;

class CardHeader extends BaseComponent
{
    public $default_class = 'card-header';
    public $content = null;
    public $size = 6;
    public $icon;
    public $title;
    public $dropDown;
    /**
     */
    public function render_additional_attributes()
    {
        if (empty($this->content) && !empty($this->title)) {
            $this->add_class('py-3');
            $this->content = container([
                'class' => 'fw-bold text-primary d-flex flex-row align-items-center justify-content-between',
                'content' => [
                    heading([
                        'size' => $this->size,
                        'class' => 'm-0',
                        'content' => [
                            $this->icon,
                            $this->title,
                        ]
                    ]), //heading
                    $this->dropDown,
                ]
            ]);
        }
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        //dump($this->toArray());
        return view('components.card.card-header', $this->toArray());
    }
}
