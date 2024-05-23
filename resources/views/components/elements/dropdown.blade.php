<{{ $tag }} {{ $container_attributes }}>
    @content($toggle)
    <ul {{ $attributes }}>
        @foreach ($items as $item)
            @content($item)
        @endforeach
    </ul>
</{{ $tag }}>
