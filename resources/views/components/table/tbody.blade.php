<tbody {{ $attributes }}>
    @foreach ($rows as $row)
        @content($row)
    @endforeach
</tbody>
