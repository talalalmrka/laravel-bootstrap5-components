@content($label_el)
@if ($has_any_icon)
    <div {{ $icons_container_attributes }}>
        @content($start_icon_el)
        <input {{ $attributes }}>
        @content($end_icon_el)
    </div>
@else
    <input {{ $attributes }}>
@endif
@content($error_el)
@content($info_el)
