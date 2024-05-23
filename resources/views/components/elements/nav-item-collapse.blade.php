<li {{ $attributes }}>
    <a {{ $toggle_attributes }}>
        <span>
            @content($icon)
            @content($label)
        </span>
    </a>
    <ul {{ $collapse_attributes }}>
        <div class="px-3">
            @content($items)
        </div>

    </ul>
</li>
