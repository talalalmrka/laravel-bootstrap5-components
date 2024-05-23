@content($label_el)
@if ($has_any_icon)
    <div {{ $icons_container_attributes }}>
        @content($start_icon_el)
        <textarea {{ $attributes }}>{{ $value }}</textarea>
        @content($end_icon_el)
    </div>
@else
    <textarea {{ $attributes }}>{{ $value }}</textarea>
@endif
@content($error_el)
@content($info_el)
