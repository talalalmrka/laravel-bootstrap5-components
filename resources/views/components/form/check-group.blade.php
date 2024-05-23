<div {{ $container_attributes }}>
    @content($label_el)
    <div {{ $attributes }}>
        @foreach ($options_el as $option)
            @content($option)
        @endforeach
    </div>
    @content($error_el)
    @content($info_el)
</div>
