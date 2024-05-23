<?php

namespace Fadgram\LaravelBootstrap5Components\View\Components;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\ViewErrorBag;
use Illuminate\View\Component;
use Illuminate\View\ComponentAttributeBag;
use Illuminate\Support\Arr;
use JsonSerializable;

abstract class BaseComponent extends Component implements Htmlable
{
    public $container_attributes;
    public $attributes;
    public $id;
    public $class;
    public $default_class;
    public $style;
    public $atts = [];

    public $container_id;
    public $container_class;
    public $default_container_class;
    public $container_style;
    public $container_atts = [];
    public $global_fillable_bags = [
        'atts' => 'attributes',
        'container_atts' => 'container_attributes',
    ];
    public $fillable_bags = [];
    public $global_fillable = [
        'id',
        'class',
        'style',
        'atts',
    ];
    public $fillable = [];
    public $global_fillable_attributes = [
        'id',
        'class',
        'style'
    ];
    public $fillable_attributes = [];
    public $container_fillable_attributes = [
        'id',
        'class',
        'style'
    ];
    public $fillable_classes = [];
    public $all_data = [];

    public function __construct($data = []) {
        $this->fill($data);
        $this->fill_bags();
        $this->render_attributes();
        $this->fill_attributes();
        $this->fill_classes();
        //$this->render_additional_attributes();
        //$this->all_data = $this->toArray();
        if(method_exists($this, 'render_additional_attributes')){
            $this->render_additional_attributes();
        }

    }
    function isFillable($name) {
        return property_exists($this, $name) || in_array($name, $this->fillable);
    }
    public function fill($data) {
        /*foreach($this as $key => $v){
            if(isset($data[$key])){
                $this->{$key} = data_get($data, $key);
            }
        }*/
        $this->fillable = array_merge($this->global_fillable, $this->fillable);
        foreach($data as $key => $value){
            if($this->isFillable($key)){
                $this->{$key} = $value;
            }
        }
    }
    public function fill_bags() {
        $this->fillable_bags = array_merge($this->global_fillable_bags, $this->fillable_bags);
        foreach($this->fillable_bags as $key => $name){
            $value = data_get($this, $key, []);
            $this->{$name} = new ComponentAttributeBag();
        }
    }
    public function fill_attributes() {
        $this->fillable_attributes = array_merge($this->global_fillable_attributes, $this->fillable_attributes);
        foreach($this->fillable_attributes as $key){
            if(property_exists($this, $key)) {
                $value = $this->{$key} ?? null;
                if(!empty($value)){
                    $this->attr([
                        $key => $value,
                    ]);
                }
            }
        }
    }

    public function fill_classes() {
        foreach($this->fillable_classes as $bag => $classesArray){
            $classesArray = is_array($classesArray) ? $classesArray : [];
            foreach($classesArray as $classInBag){
                if(!empty($this->{$classInBag})){
                    $this->add_class($this->{$classInBag}, $bag);
                }
            }
        }
    }
    public function render_attributes() {
        /*if(empty($this->id)){
            $this->id = uniqid('component-');
            $this->attr([
                'id' => $this->id,
            ]);
        }*/
        //container
        if(!empty($this->default_container_class)){
            $this->add_container_class($this->default_container_class);
        }
        if(!empty($this->container_class)){
            //$this->add_container_class($this->container_class);
        }
        if(!empty($this->container_atts)){
            $this->container_attr($this->container_atts);
        }
        if(!empty($this->container_style)){
            $this->add_container_style($this->container_style);
        }

        //element
        if(!empty($this->default_class)){
            $this->add_class($this->default_class);
        }
        if(!empty($this->class)){
            //$this->add_class($this->class);
        }
        if(!empty($this->atts)){
            $this->attr($this->atts);
        }
        /*if(!empty($this->style)){
            $this->add_style($this->style);
        }*/
    }
    /*public function render_additional_attributes() {
        $this->all_data = $this->toArray();
    }*/
    public static function fromArray(array $data)
    {
        $called_class = get_called_class();
        return new $called_class($data);
    }
    public function toArray()
    {
        return array_merge(get_object_vars($this), [
            'all_data' => get_object_vars($this)
        ]);
    }
    //////end
    /*public function render_fillable_attributes() {
        foreach($this->fillable_attributes as $key){
            $value = data_get($this, $key);
            if(!empty($value)){
                $this->attr([$key => $value]);
            }
        }
    }
    public function createContainerAttributesIfNotCreated()
    {
        $this->container_attributes = isset($this->container_attributes) ? $this->container_attributes : new ComponentAttributeBag([]);
    }
    public function renderContainerClasses()
    {
        $this->createContainerAttributesIfNotCreated();
        $container_class = Arr::toCssClasses([$this->default_container_class, $this->container_class]);
        if (!empty($container_class)) {
            $this->container_atts['class'] = $container_class;
        }
    }
    public function renderContainerStyles()
    {
        $this->createContainerAttributesIfNotCreated();
        if (isset($this->container_style) && !empty($this->container_style)) {
            $this->container_atts['style'] = Arr::toCssStyles($this->container_style);
        }
    }
    public function renderContainerAtts()
    {
        $this->createContainerAttributesIfNotCreated();
        $this->container_atts = is_array($this->container_atts) ? $this->container_atts : [];
    }
    public function renderContainerAttributes()
    {
        $this->renderContainerClasses();
        $this->renderContainerStyles();
        $this->renderContainerAtts();
    }
    public function createAttributesIfNotCreated()
    {
        $this->attributes = isset($this->attributes) ? $this->attributes : new ComponentAttributeBag();
    }
    public function renderClasses()
    {
        $this->createAttributesIfNotCreated();
        $class = Arr::toCssClasses([$this->default_class, $this->class]);
        if (!empty($class)) {
            $this->atts['class'] = $class;
        }
    }
    public function renderStyles()
    {
        $this->createAttributesIfNotCreated();
        if (isset($this->style) && !empty($this->style)) {
            $this->atts['style'] = Arr::toCssStyles($this->style);
            //$this->attributes->style($this->style);
        }
    }
    public function renderAtts()
    {
        $this->createAttributesIfNotCreated();
        if (!empty($this->id)) {
            $this->atts['id'] = $this->id;
        }
        $this->atts = is_array($this->atts) ? $this->atts : [];
    }
    public function renderAttributes()
    {
        $this->renderContainerAttributes();
        $this->renderClasses();
        $this->renderStyles();
        $this->renderAtts();
        $this->container_attributes = new ComponentAttributeBag($this->container_atts);
        $this->attributes = new ComponentAttributeBag($this->atts);
    }
    */
    public function strToClassList($str) {
        if(is_array($str)){
            return array_unique(array_values($str));
        }elseif(is_string($str)){
            return array_unique(array_values(explode(' ', $str)));
        }else{
            return [];
        }
    }
    public function strToStyleList($str) {
        if(is_array($str)){
            return $str;
        }elseif(is_string($str)){
            return array_filter(explode(';', $str), function($item) {
                return !empty($item);
            });
        }else{
            return [];
        }
    }
    /**
     * Merges given attributes into the specified attribute bag.
     *
     * @param array $attributes The attributes to be merged.
     * @param string $name The name of the attribute bag. Defaults to 'attributes'.
     *
     * @return void
     */
    public function attr($attributes, $name = 'attributes')
    {

        if (!isset($this->{$name}) || !$this->{$name} instanceof ComponentAttributeBag) {
            $this->{$name} = new ComponentAttributeBag();
        }
        foreach($attributes as $key => $value){
            if($key == 'class'){
                $classList = [];
                $currentClass = $this->{$name}->get('class');
                if(!empty($currentClass)){
                    $currentClassList = $this->strToClassList($currentClass);
                    $classList = array_merge($classList, $currentClassList);
                }
                if(!empty($value)){
                    $valueClassList = $this->strToClassList($value);
                    $classList = array_merge($classList, $valueClassList);
                }
                $classList = array_unique(array_values($classList));
                $this->{$name}->offsetSet('class', Arr::toCssClasses($classList));
            }elseif($key == 'style'){
                $styleList = [];
                $currentStyle = $this->{$name}->get('style');
                if(!empty($currentStyle)){
                    $currentStyleList = $this->strToStyleList($currentStyle);
                    $styleList = array_merge($styleList, $currentStyleList);
                }
                if(!empty($value)){
                    $valueStyleList = $this->strToStyleList($value);
                    $styleList = array_merge($styleList, $valueStyleList);
                }
                $styleList = array_unique(array_values($styleList));
                $this->{$name}->offsetSet('style', Arr::toCssStyles($styleList));

            }else{
                $this->{$name}->offsetSet($key, $value);
            }
        }
    }
    /**
     * Merges given attributes into the container attribute bag.
     *
     * @param array $attributes The attributes to be merged.
     *
     * @return void
     */
    public function container_attr($attributes)
    {
        $this->attr($attributes, 'container_attributes');
    }
    /**
     * Merges given classes into the specified attribute bag.
     *
     * @param string $className The className to be added.
     * @param string $name The name of the attribute bag. Defaults to 'attributes'.
     *
     * @return void
     */
    public function add_class($className, $name = 'attributes') {
        $this->attr([
            'class' => $className,
        ], $name);
        if($this->{$name}->has('class') && strpos($this->{$name}->get('class'), $className) !== false){

        }

    }
    /**
     * Merges given classes into the container attribute bag.
     *
     * @param string $className The className to be added.
     *
     * @return void
     */
    public function add_container_class($className) {
        $this->attr([
            'class' => $className,
        ], 'container_attributes');
    }
    public function add_style($style, $name = 'attributes') {
        $this->attr([
            'style' => $style,
        ], $name);
    }
    public function add_container_style($style) {
        $this->attr([
            'style' => $style,
        ], 'container_attributes');
    }

    public function has_error() {
        return !empty($this->id) && session()->get('errors', app(ViewErrorBag::class))->has($this->id);
    }
    abstract public function render_additional_attributes();
    abstract public function render();
    public function toHtml() {
        ob_start();
        echo $this->render();
        return ob_get_clean();
    }
}
