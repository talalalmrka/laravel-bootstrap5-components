<a {{ $attributes }}>
    @content($icon)
    @if (!empty($label))
        <span>{{ $label }}</span>
    @endif
</a>
@if ($divider)
    <hr class="dropdown-divider">
@endif
