<tfoot {{ $attributes }}>
    @foreach($rows as $row)
        @content($row)
    @endforeach
</tfoot>

