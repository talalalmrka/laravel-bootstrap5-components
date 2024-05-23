<div {{ $container_attributes }}>
    <input {{ $attributes }}>
    <label {{ $label_attributes }}>
        @content($icon)
        @content($label)
    </label>

    @content($error_el)
    @content($info_el)
</div>
