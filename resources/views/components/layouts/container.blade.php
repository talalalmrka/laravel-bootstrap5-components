@if (!empty($tag))
    <{{ $tag }} {{ $attributes }}>
@endif
@content($content)
@if (!empty($tag))
    </{{ $tag }}>
@endif
