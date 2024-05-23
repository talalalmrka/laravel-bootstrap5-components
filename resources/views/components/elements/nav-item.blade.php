@if ($middleware)
    <li {{ $container_attributes }}>
        <a {{ $attributes }}>
            @content($icon)
            @content($label)
        </a>
    </li>
@endif
