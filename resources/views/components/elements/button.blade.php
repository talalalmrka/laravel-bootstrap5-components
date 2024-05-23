<button {{ $attributes }}>
    @if ($iconPosition == 'start')
        @content($icon)
    @endif
    @content($label)
    @if ($iconPosition == 'end')
        @content($icon)
    @endif
</button>
