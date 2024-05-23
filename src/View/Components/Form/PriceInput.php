<?php

namespace Fadgram\LaravelBootstrap5Components\Form;

use App\Utils\CurrencyUtil;
use Fadgram\LaravelBootstrap5Components\View\Components\BaseComponent;
use Closure;
use Illuminate\Contracts\View\View;

class PriceInput extends TextInput
{
    public $type = 'number';
    public $min;
    public $max;
    public $step = '0.01';
    public $default_class = 'form-control';
    public $fillable_attributes = [
        'id',
        'type',
        'name',
        'value',
        'autocomplete',
        'placeholder',
        'min',
        'max',
        'step',
    ];

    public function __construct($data = []) {
        $this->endIcon = span([
            'content' => CurrencyUtil::currentCurrencySymbol(),
        ]);
        //$this->endIcon = CurrencyUtil::priceFormatted('');
        parent::__construct($data);
    }
}
