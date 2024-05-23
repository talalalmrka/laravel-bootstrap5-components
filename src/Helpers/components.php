<?php
use Fadgram\LaravelBootstrap5Components\View\Components\Card\Card;
use Fadgram\LaravelBootstrap5Components\View\Components\Card\CardBody;
use Fadgram\LaravelBootstrap5Components\View\Components\Card\CardFooter;
use Fadgram\LaravelBootstrap5Components\View\Components\Card\CardHeader;
use Fadgram\LaravelBootstrap5Components\View\Components\Elements\Button;
use Fadgram\LaravelBootstrap5Components\View\Components\Elements\CustomHtml;
use Fadgram\LaravelBootstrap5Components\View\Components\Elements\Divider;
use Fadgram\LaravelBootstrap5Components\View\Components\Elements\Dropdown;
use Fadgram\LaravelBootstrap5Components\View\Components\Elements\DropdownItem;
use Fadgram\LaravelBootstrap5Components\View\Components\Elements\FaIcon;
use Fadgram\LaravelBootstrap5Components\View\Components\Elements\Heading;
use Fadgram\LaravelBootstrap5Components\View\Components\Elements\Image;
use Fadgram\LaravelBootstrap5Components\View\Components\Elements\Link;
use Fadgram\LaravelBootstrap5Components\View\Components\Elements\Logo;
use Fadgram\LaravelBootstrap5Components\View\Components\Elements\Nav;
use Fadgram\LaravelBootstrap5Components\View\Components\Elements\NavItem;
use Fadgram\LaravelBootstrap5Components\View\Components\Elements\NavItemCollapse;
use Fadgram\LaravelBootstrap5Components\View\Components\Elements\OrSeperator;
use Fadgram\LaravelBootstrap5Components\View\Components\Elements\Pagination;
use Fadgram\LaravelBootstrap5Components\View\Components\Elements\Paragraph;
use Fadgram\LaravelBootstrap5Components\View\Components\Elements\Progress;
use Fadgram\LaravelBootstrap5Components\View\Components\Elements\Small;
use Fadgram\LaravelBootstrap5Components\View\Components\Elements\Span;
use Fadgram\LaravelBootstrap5Components\View\Components\Form\Checkbox;
use Fadgram\LaravelBootstrap5Components\View\Components\Form\CheckGroup;
use Fadgram\LaravelBootstrap5Components\View\Components\Form\CustomInput;
use Fadgram\LaravelBootstrap5Components\View\Components\Form\Field;
use Fadgram\LaravelBootstrap5Components\View\Components\Form\Fields;
use Fadgram\LaravelBootstrap5Components\View\Components\Form\FileInput;
use Fadgram\LaravelBootstrap5Components\View\Components\Form\Form;
use Fadgram\LaravelBootstrap5Components\View\Components\Form\PriceInput;
use Fadgram\LaravelBootstrap5Components\View\Components\Form\Radiobox;
use Fadgram\LaravelBootstrap5Components\View\Components\Form\RadioGroup;
use Fadgram\LaravelBootstrap5Components\View\Components\Form\Select;
use Fadgram\LaravelBootstrap5Components\View\Components\Form\Switchbox;
use Fadgram\LaravelBootstrap5Components\View\Components\Form\SwitchGroup;
use Fadgram\LaravelBootstrap5Components\View\Components\Form\Textarea;
use Fadgram\LaravelBootstrap5Components\View\Components\Form\TextInput;
use Fadgram\LaravelBootstrap5Components\View\Components\Layouts\Column;
use Fadgram\LaravelBootstrap5Components\View\Components\Layouts\Container;
use Fadgram\LaravelBootstrap5Components\View\Components\Layouts\Row;
use Fadgram\LaravelBootstrap5Components\View\Components\Modal\Modal;
use Fadgram\LaravelBootstrap5Components\View\Components\Modal\ModalBody;
use Fadgram\LaravelBootstrap5Components\View\Components\Modal\ModalFooter;
use Fadgram\LaravelBootstrap5Components\View\Components\Modal\ModalHeader;
use Fadgram\LaravelBootstrap5Components\View\Components\Table\Table;
use Fadgram\LaravelBootstrap5Components\View\Components\Table\TableCell;
use Fadgram\LaravelBootstrap5Components\View\Components\Table\TableRow;
use Fadgram\LaravelBootstrap5Components\View\Components\Table\Tbody;
use Fadgram\LaravelBootstrap5Components\View\Components\Table\Tfoot;
use Fadgram\LaravelBootstrap5Components\View\Components\Table\Thead;
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
function heading($data = [])
{
    return Heading::fromArray($data);
}
function content($content = null)
{
    if (empty($content)) {
        return;
    } elseif (is_object($content) && method_exists($content, 'render')) {
        echo $content->render();
    } elseif (is_string($content) || is_numeric($content)) {
        echo $content;
    } elseif (is_array($content)) {
        foreach ($content as $item) {
            content($item);
        }
    }
    //return Content::fromArray(['content' => $content]);
}
function paragraph($data = [])
{
    return Paragraph::fromArray($data);
}

function image($data = [])
{
    return Image::fromArray($data);
}
function mylink($data = [])
{
    return Link::fromArray($data);
}

function customHtml($html = null)
{
    return new CustomHtml($html);
}
function button($data = [])
{
    return Button::fromArray($data);
}
/**
 * Summary of row
 * @param mixed $data
 * @return object
 */
function row($data = [])
{
    return Row::fromArray($data);
}
/**
 * Summary of column
 * @param mixed $data
 * @return object
 */
function column($data = [])
{
    return Column::fromArray($data);
}
/**
 * Summary of card
 * @param mixed $data
 * @return object
 */
function card($data = [])
{
    return Card::fromArray($data);
}
/**
 * Summary of cardBody
 * @param mixed $data
 * @return object
 */
function cardBody($data = [])
{
    return CardBody::fromArray($data);
}
/**
 * Summary of cardHeader
 * @param mixed $data
 * @return object
 */
function cardHeader($data = [])
{
    return CardHeader::fromArray($data);
}
function cardFooter($data = [])
{
    return CardFooter::fromArray($data);
}
/**
 * Summary of progress
 * @param mixed $data
 * @return object
 */
function progress($data = [])
{
    return Progress::fromArray($data);
}

function faIcon($icon = null, $data = [])
{
    return FaIcon::fromArray(array_merge([
        'icon' => $icon,
    ], $data));
}
function form($data = [])
{
    return Form::fromArray($data);
}

function formFields($data = [])
{
    return Fields::fromArray($data);
}
function formField($data = [])
{
    return Field::fromArray($data);
}

function textInput($data = [])
{
    return TextInput::fromArray($data);
}
function priceInput($data = [])
{
    return PriceInput::fromArray($data);
}
function textarea($data = [])
{
    return Textarea::fromArray($data);
}
function checkbox($data = [])
{
    return Checkbox::fromArray($data);
}
function switchbox($data = [])
{
    return Switchbox::fromArray($data);
}
function radiobox($data = [])
{
    return Radiobox::fromArray($data);
}
function checkGroup($data = [])
{
    return CheckGroup::fromArray($data);
}
function switchGroup($data = [])
{
    return SwitchGroup::fromArray($data);
}
function radioGroup($data = [])
{
    return RadioGroup::fromArray($data);
}
function formSelect($data = [])
{
    return Select::fromArray($data);
}
function fileInput($data = [])
{
    return FileInput::fromArray($data);
}
function customInput($data = [])
{
    return CustomInput::fromArray($data);
}

function table($data = []) {
    return Table::fromArray($data);
}
function thead($data = []) {
    return Thead::fromArray($data);
}
function tbody($data = []) {
    return Tbody::fromArray($data);
}
function tfoot($data = []) {
    return Tfoot::fromArray($data);
}
function tableCell($data = []) {
    return TableCell::fromArray($data);
}
function tableRow($data = []) {
    return TableRow::fromArray($data);
}
function divider($data = []) {
    return Divider::fromArray($data);
}
/**
 * bootstrap modal component.
 *
 * @param array $data The data array, structured as follows:
 *                    'id' => (string) the modal id.
 *                    'static_backdrop' => (bool) is modal has static backdrop default false.
 *                    'scrollable' => (bool) is modal scrollable default false.
 *                    'centered' => (bool) is modal centered default false.
 *                    'size' => (string) size: sm, lg, xl.
 *                    'fullscreen' => (bool) modal fullscreen default false.
 *                    'header' => (ModalHeader|null) the modal header component default null.
 *                    'body' => (ModalBody|null) the modal body component default null.
 *                    'footer' => (ModalFooter|null) the modal footer default null.
 *
 */
function modal($data = []) {
    return Modal::fromArray($data);
}
/**
 * bootstrap modal header.
 *
 * @param array $data The data array, structured as follows:
 *                    'title' => (mixed) string or component modal title.
 *
 */
function modalHeader($data = []) {
    return ModalHeader::fromArray($data);

}
/**
 * bootstrap modal body.
 *
 * @param array $data The data array, structured as follows:
 *                    'content' => (mixed) string or component modal body default null.
 *
 */
function modalBody($data = []) {
    return ModalBody::fromArray($data);

}
/**
 * bootstrap footer body.
 *
 * @param array $data The data array, structured as follows:
 *                    'content' => (mixed) string or component modal footer default null.
 *
 */
function modalFooter($data = []) {
    return ModalFooter::fromArray($data);
}
/**
 * Undocumented function
 *
 * @param \Illuminate\Contracts\Pagination\Paginator $model
 * @return object
 */
function pagination($model) {
    return Pagination::fromArray([
        'model' => $model,
    ]);
}
/**
 * orSeperator component function
 *
 * @param array $data
 * @return object
 */
function orSeperator($data) {
    return OrSeperator::fromArray($data);
}
function nav($data) {
    return Nav::fromArray($data);
}
function navItem($data) {
    return NavItem::fromArray($data);
}
function navItemCollapse($data) {
    return NavItemCollapse::fromArray($data);
}
function dropdown($data) {
    return Dropdown::fromArray($data);
}
function dropdownItem($data) {
    return DropdownItem::fromArray($data);
}
function logo($data = []) {
    return Logo::fromArray($data);
}
function small($data = []) {
    return Small::fromArray($data);
}
function span($data = []) {
    return Span::fromArray($data);
}