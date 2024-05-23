<?php
use Fadgram\LaravelBootstrap5Components\View\Components\Layouts\Container;

/**
 * Summary of container
 * @param mixed $data The data array, structured as follows:
 * 'id' => (string) the id attribute
 * 'class' => (string) the class attribute
 * 'style' => (string) the style attribute
 * 'atts' => (array) array of attributes 
 * 'tag' => (string) the html tag default div.
 * 'content' => (mixed) the content.
 * @return object
 */
function container($data = [])
{
    return Container::fromArray($data);
}