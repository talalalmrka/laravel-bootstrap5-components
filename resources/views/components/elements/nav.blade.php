<{{ $tag }} {{ $attributes }}>
    @foreach ($items as $item)
        @content($item)
    @endforeach
</{{ $tag }}>
