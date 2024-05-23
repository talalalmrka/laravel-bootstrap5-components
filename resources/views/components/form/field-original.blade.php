@php
    $has_error = !empty($id) && $errors->has($id);
    $field_error_describedby = $has_icon && $has_error ? $id . '-error' : '';
@endphp
@if ($has_error)
    @if (!empty($input_el))
        @php
            $input_el->add_class('is-invalid');
            $input_el->attr([
                'aria-describedby' => $id . '-error',
            ]);
            //$input_el->attributes = $input_el->attributes = .= ' is-invalid';
            //$input_el->atts['aria-describedby'] = $id . '-error';
            //$input_el->renderAttributes();
        @endphp
    @endif
@endif
<div {{ $container_attributes }}>
    @content($label_el)
    @if ($has_icon)
        <div class="field-with-icon is-invalid {{ !empty($start_icon_el) ? ' has-start-icon' : '' }}{{ !empty($end_icon_el) ? ' has-end-icon' : '' }}"
            aria-describedby="{{ $field_error_describedby }}">
            @content($start_icon_el)
            @content($input_el)
            @content($end_icon_el)
        </div>
    @else
        @content($input_el)
    @endif
    @if ($has_error)
        <div id="{{ $id }}-error" class="invalid-feedback">
            {{ $errors->first($id) }}
        </div>
    @endif
    @content($info_el)
</div>
