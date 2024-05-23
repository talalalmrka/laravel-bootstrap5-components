<?php
use Fadgram\LaravelBootstrap5Components\View\Components\BaseComponent;
use Illuminate\View\Component;
/**
 * Summary of pre
 * @param mixed $data
 * @param bool $echo default true.
 * @return void|string
 */
function pre($data, $echo = true)
{
    ob_start();
    dump($data);
    $ret = ob_get_clean();
    if ($echo) {
        echo $ret;
    } else {
        return $ret;
    }
}
/**
 * Summary of is_component
 * @param mixed $data
 * @return bool
 */
function is_component($data)
{
    return $data instanceof BaseComponent || $data instanceof Component;
}