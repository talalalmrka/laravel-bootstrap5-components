<div {{ $attributes }}>
@if (!empty($cols))
    @foreach ($cols as $column)
        @content($column)
    @endforeach
@endif
</div>
