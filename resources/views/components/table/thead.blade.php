<thead {{ $attributes }}>
    @foreach($rows as $row)
        @content($row)
    @endforeach
</thead>

