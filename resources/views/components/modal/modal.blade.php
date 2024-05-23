<div {{ $attributes }}>
    <div {{ $dialog_attributes }}>
        <div class="modal-content">
            @content($header)
            @content($body)
            @content($footer)
        </div>
    </div>
</div>
