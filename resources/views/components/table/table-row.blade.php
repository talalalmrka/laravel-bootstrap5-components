<tr {{ $attributes }}>
    @foreach($cells as $cell)
        @content($cell)
    @endforeach
</tr>
